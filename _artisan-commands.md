# Artisan Commands

## Create controller

php artisan make:controller ControllerName

## Create resource controller

php artisan make:controller ControllerName -r

## Database Migration

php artisan migrate

## create a new migration

php artisan make:migration create_posts_table

## restart the migration from scratch

php artisan migrate:fresh

## undo last migration

php artisan migrate:rollback

## undo specific migration steps

php artisan migrate:rollback --step=5

## create a model

php artisan make:model PostStatus

## create a model with migration

php artisan make:model PostStatus -m
