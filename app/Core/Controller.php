<?php

namespace App\Core;

class Controller
{
    protected function view(string $path, array $data = []): string
    {
        return view($path, $data);
    }
    
    protected function redirect(string $url): void
    {
        redirect($url);
    }
    
    protected function back(): void
    {
        back();
    }
    
    protected function validate(array $rules): array
    {
        $data = [];
        $errors = [];
        
        foreach ($rules as $field => $ruleSet) {
            $value = $_POST[$field] ?? '';
            $data[$field] = $value;
            
            if (strpos($ruleSet, 'required') !== false && empty($value)) {
                $errors[$field] = ucfirst($field) . ' is required';
                continue;
            }
            
            if (strpos($ruleSet, 'email') !== false && !empty($value) && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $errors[$field] = ucfirst($field) . ' must be a valid email';
            }
            
            if (preg_match('/min:(\d+)/', $ruleSet, $matches) && strlen($value) < $matches[1]) {
                $errors[$field] = ucfirst($field) . ' must be at least ' . $matches[1] . ' characters';
            }
            
            if (preg_match('/max:(\d+)/', $ruleSet, $matches) && strlen($value) > $matches[1]) {
                $errors[$field] = ucfirst($field) . ' must not exceed ' . $matches[1] . ' characters';
            }
        }
        
        if (!empty($errors)) {
            flash('errors', $errors);
            foreach ($data as $key => $value) {
                flash('old_' . $key, $value);
            }
            back();
        }
        
        return $data;
    }
    
    protected function json(array $data, int $status = 200): string
    {
        http_response_code($status);
        header('Content-Type: application/json');
        return json_encode($data);
    }
}
