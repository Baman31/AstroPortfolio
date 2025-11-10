# AstroDevki - GCP Ubuntu VM Deployment Guide

## Prerequisites
- Google Cloud Platform account with billing enabled
- Basic knowledge of terminal/SSH
- Domain name (optional, for custom domain)

## Step 1: Create Ubuntu VM on GCP

### 1.1 Create VM Instance
1. Go to GCP Console → Compute Engine → VM Instances
2. Click "CREATE INSTANCE"
3. Configure:
   - **Name**: astrodevki-server
   - **Region**: Choose closest to your users (e.g., us-central1)
   - **Machine type**: e2-small (2 vCPU, 2GB RAM) - minimum recommended
   - **Boot disk**: Ubuntu 22.04 LTS
   - **Disk size**: 20 GB
   - **Firewall**: 
     - ✅ Allow HTTP traffic
     - ✅ Allow HTTPS traffic
4. Click "CREATE"

### 1.2 Configure Firewall Rules
1. Go to VPC Network → Firewall
2. Create firewall rule:
   - **Name**: allow-http-https
   - **Targets**: All instances in network
   - **Source IP ranges**: 0.0.0.0/0
   - **Protocols and ports**: 
     - tcp:80
     - tcp:443
     - tcp:5000 (for initial testing)

## Step 2: Connect to Your VM

### 2.1 SSH into VM
```bash
# From GCP Console, click "SSH" button next to your VM
# Or use gcloud CLI:
gcloud compute ssh astrodevki-server --zone=YOUR_ZONE
```

## Step 3: Install Required Software

### 3.1 Update System
```bash
sudo apt update && sudo apt upgrade -y
```

### 3.2 Install PHP 8.2 and Extensions
```bash
# Add PHP repository
sudo apt install -y software-properties-common
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update

# Install PHP 8.2 and required extensions
sudo apt install -y php8.2 php8.2-cli php8.2-fpm php8.2-mysql php8.2-xml \
  php8.2-mbstring php8.2-curl php8.2-zip php8.2-gd php8.2-sqlite3
```

### 3.3 Install Composer
```bash
cd ~
curl -sS https://getcomposer.org/installer -o composer-setup.php
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
rm composer-setup.php
```

### 3.4 Install Node.js and npm
```bash
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install -y nodejs
```

### 3.5 Install Nginx
```bash
sudo apt install -y nginx
```

### 3.6 Install Certbot (for SSL)
```bash
sudo apt install -y certbot python3-certbot-nginx
```

## Step 4: Upload Your Application

### 4.1 Create Application Directory
```bash
sudo mkdir -p /var/www/astrodevki
sudo chown $USER:$USER /var/www/astrodevki
```

### 4.2 Upload Code (Choose ONE method)

**Method A: Using Git (Recommended)**
```bash
# If you push your code to GitHub/GitLab first
cd /var/www/astrodevki
git clone YOUR_REPO_URL .
```

**Method B: Using SCP from your local machine**
```bash
# From your local machine (not on VM)
# First, download the project from Replit
# Then upload to VM:
gcloud compute scp --recurse ./your-project-folder/* astrodevki-server:/var/www/astrodevki/ --zone=YOUR_ZONE
```

**Method C: Manual Upload via SFTP**
Use FileZilla or similar SFTP client to upload files

## Step 5: Configure Application

### 5.1 Install PHP Dependencies
```bash
cd /var/www/astrodevki
composer install --no-dev --optimize-autoloader
```

### 5.2 Install Node Dependencies and Build Assets
```bash
npm install
npm run build:css
```

### 5.3 Create Environment File
```bash
cd /var/www/astrodevki
cp .env.example .env  # If you have .env.example
nano .env
```

Add/Update these values:
```env
APP_NAME=AstroDevki
APP_ENV=production
APP_DEBUG=false
APP_URL=http://YOUR_VM_IP_OR_DOMAIN

# Database (if using MySQL instead of SQLite)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=astrodevki
DB_USERNAME=your_db_user
DB_PASSWORD=your_secure_password

# For SQLite (default)
DB_CONNECTION=sqlite
DB_DATABASE=/var/www/astrodevki/storage/database.sqlite
```

### 5.4 Set Permissions
```bash
sudo chown -R www-data:www-data /var/www/astrodevki
sudo chmod -R 755 /var/www/astrodevki
sudo chmod -R 775 /var/www/astrodevki/storage
```

### 5.5 Initialize Database
```bash
# If using SQLite
touch /var/www/astrodevki/storage/database.sqlite
sudo chown www-data:www-data /var/www/astrodevki/storage/database.sqlite
sudo chmod 664 /var/www/astrodevki/storage/database.sqlite

# Run migrations
cd /var/www/astrodevki
php scripts/migrate.php
php scripts/seed.php
```

## Step 6: Configure Nginx

### 6.1 Create Nginx Configuration
```bash
sudo nano /etc/nginx/sites-available/astrodevki
```

Add this configuration:
```nginx
server {
    listen 80;
    server_name YOUR_DOMAIN_OR_IP;
    root /var/www/astrodevki/public;
    
    index index.php index.html;
    
    # Security headers
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header X-XSS-Protection "1; mode=block" always;
    
    # Gzip compression
    gzip on;
    gzip_vary on;
    gzip_types text/plain text/css application/json application/javascript text/xml application/xml text/javascript;
    
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }
    
    location ~ /\.(?!well-known).* {
        deny all;
    }
    
    location ~* \.(jpg|jpeg|png|gif|ico|css|js|svg|woff|woff2|ttf|eot)$ {
        expires 365d;
        add_header Cache-Control "public, immutable";
    }
}
```

### 6.2 Enable Site
```bash
sudo ln -s /etc/nginx/sites-available/astrodevki /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx
```

## Step 7: Setup SSL Certificate (HTTPS)

### 7.1 If you have a domain name:
```bash
sudo certbot --nginx -d yourdomain.com -d www.yourdomain.com
```

### 7.2 Point your domain to VM IP:
1. Get your VM's external IP from GCP Console
2. Go to your domain registrar's DNS settings
3. Add A record pointing to VM IP

## Step 8: Configure PHP-FPM for Production

### 8.1 Optimize PHP-FPM
```bash
sudo nano /etc/php/8.2/fpm/pool.d/www.conf
```

Find and update:
```ini
pm = dynamic
pm.max_children = 50
pm.start_servers = 5
pm.min_spare_servers = 5
pm.max_spare_servers = 35
pm.max_requests = 500
```

### 8.2 Restart PHP-FPM
```bash
sudo systemctl restart php8.2-fpm
```

## Step 9: Setup Process Management (Optional)

For better reliability, use Supervisor to keep your app running:

```bash
sudo apt install -y supervisor

# Create supervisor config
sudo nano /etc/supervisor/conf.d/astrodevki.conf
```

Add:
```ini
[program:astrodevki]
process_name=%(program_name)s
command=/usr/bin/php /var/www/astrodevki/public/index.php
autostart=true
autorestart=true
user=www-data
redirect_stderr=true
stdout_logfile=/var/log/astrodevki.log
```

```bash
sudo supervisorctl reread
sudo supervisorctl update
```

## Step 10: Security Hardening

### 10.1 Setup Firewall
```bash
sudo ufw allow 'Nginx Full'
sudo ufw allow OpenSSH
sudo ufw enable
```

### 10.2 Disable Directory Listing
Already handled in Nginx config above

### 10.3 Regular Updates
```bash
# Create update script
sudo nano /usr/local/bin/update-system.sh
```

Add:
```bash
#!/bin/bash
apt update && apt upgrade -y
apt autoremove -y
```

```bash
sudo chmod +x /usr/local/bin/update-system.sh
```

## Step 11: Monitoring and Logs

### View Nginx Logs
```bash
sudo tail -f /var/log/nginx/access.log
sudo tail -f /var/log/nginx/error.log
```

### View PHP Logs
```bash
sudo tail -f /var/log/php8.2-fpm.log
```

## Step 12: Backup Strategy

### 12.1 Database Backup Script
```bash
nano ~/backup-db.sh
```

Add:
```bash
#!/bin/bash
BACKUP_DIR="/home/$USER/backups"
DATE=$(date +%Y%m%d_%H%M%S)
mkdir -p $BACKUP_DIR

# Backup SQLite database
cp /var/www/astrodevki/storage/database.sqlite $BACKUP_DIR/database_$DATE.sqlite

# Keep only last 7 days of backups
find $BACKUP_DIR -name "database_*.sqlite" -mtime +7 -delete
```

```bash
chmod +x ~/backup-db.sh

# Add to crontab for daily backups at 2 AM
crontab -e
# Add: 0 2 * * * /home/YOUR_USERNAME/backup-db.sh
```

## Troubleshooting

### Check if services are running:
```bash
sudo systemctl status nginx
sudo systemctl status php8.2-fpm
```

### Check permissions:
```bash
ls -la /var/www/astrodevki
```

### View recent errors:
```bash
sudo tail -50 /var/log/nginx/error.log
```

### Test PHP processing:
```bash
echo "<?php phpinfo(); ?>" | sudo tee /var/www/astrodevki/public/info.php
# Visit: http://YOUR_IP/info.php
# DELETE this file after testing!
```

## Performance Optimization

### Enable OPcache
```bash
sudo nano /etc/php/8.2/fpm/php.ini
```

Find and update:
```ini
opcache.enable=1
opcache.memory_consumption=128
opcache.interned_strings_buffer=8
opcache.max_accelerated_files=10000
opcache.revalidate_freq=2
```

### Restart PHP-FPM
```bash
sudo systemctl restart php8.2-fpm
```

## Maintenance Commands

```bash
# Restart all services
sudo systemctl restart nginx php8.2-fpm

# View all processes
sudo systemctl status nginx php8.2-fpm

# Check disk space
df -h

# Check memory usage
free -h

# Monitor real-time logs
sudo tail -f /var/log/nginx/access.log /var/log/nginx/error.log
```

## Cost Estimation (GCP)

- **e2-small VM**: ~$13-15/month
- **20GB Disk**: ~$1.60/month
- **Network egress**: Varies based on traffic
- **Total**: ~$15-20/month (estimate)

## Next Steps After Deployment

1. ✅ Test all website features
2. ✅ Setup monitoring (Google Cloud Monitoring)
3. ✅ Configure automated backups
4. ✅ Setup email service (for contact forms)
5. ✅ Configure payment gateways (Razorpay/Stripe)
6. ✅ Add Google Analytics
7. ✅ Setup uptime monitoring

---

**Need Help?** 
- Check logs first
- Verify all services are running
- Ensure permissions are correct
- Test database connectivity
