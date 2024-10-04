@extends('backend.layouts.app')

<style>
    .welcome-card {
        background-color: #505c45;
        color: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
    }

    .welcome-header {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .welcome-text {
        font-size: 1.2rem;
        margin-bottom: 15px;
    }

    .action-buttons {
        margin-top: 20px;
    }

    .action-buttons a {
        text-decoration: none;
        color: white;
        font-weight: bold;
        margin: 0 10px;
        padding: 10px 20px;
        border-radius: 5px;
        background-color: transparent;
        border: 2px solid #bfdaa4;
        border-radius: 10px;
        transition: background-color 0.3s ease;
    }

    .action-buttons a:hover {
        background-color: #bfdaa4;
        color: white;
    }
</style>

<div class="container d-flex justify-content-center align-items-center pt-5">
    <div class="welcome-card">
        <div class="welcome-header">Welcome to the Developer Admin Panel</div>
        <p class="welcome-text">
            We're glad to have you here! Use this panel to manage users, products, and system settings. Everything you
            need to streamline your development process is just a click away.
        </p>
        <div class="action-buttons">
            <a href="{{ url('adminusers') }}">Manage Users</a>
            <a href="{{ url('adminproduct') }}">Manage Products</a>
        </div>
    </div>
</div>
