# Beesist

**Beesist** is a comprehensive, modular property management system built on Laravel. It leverages a Modular Monolith architecture to handle complex workflows for landlords, property managers, agents, and tenants.

## 🏗 Architecture

The project follows a **Modular Monolith** pattern using [nwidart/laravel-modules](https://nwidart.com/laravel-modules). This allows for separation of concerns where each business domain is encapsulated in its own module.

### Core Modules

- **Property**: Manages buildings, individual properties, media, and listings. Handles "Showings" logic including scheduling and performance reports.
- **RentalApplication**: Handles the end-to-end leasing process, including application forms, resume handling, and screening questions.
- **Tenant**: Manages tenant profiles and relationships.
- **Leads**: Tracks potential tenants and CRM features.
- **FormBuilder**: Dynamic form generation for applications/surveys.
- **Cms**: Content management for frontend pages.
- **Blog**: Blogging functionality.

### 👥 Role-Based Access Control (RBAC)

The system uses [spatie/laravel-permission](https://spatie.be/docs/laravel-permission) to define distinct portals for different user types:

- **Admin**: Full system control (`/admin`).
- **Manager**: Property portfolio management (`/manager`).
- **Owner**: View performance and property stats (`/owner`).
- **Agent**: Manage showings and leads (`/agent`).

## 🛠 Tech Stack

**Backend**

- **Framework**: Laravel 11.x
- **Modules**: `nwidart/laravel-modules` v10
- **Authentication**: `laravel/sanctum`, `lab404/laravel-impersonate`
- **Payments**: `laravel/cashier` (Stripe)
- **Permissions**: `spatie/laravel-permission`
- **PDF**: `barryvdh/laravel-dompdf`
- **Activity Log**: `spatie/laravel-activitylog`

**Frontend**

- **Templating**: Blade Components
- **Interactivity**: Livewire 3 (`livewire/livewire`), `mhmiton/laravel-modules-livewire`
- **Tables**: `rappasoft/laravel-livewire-tables`
- **Editor**: `tinymce/tinymce`

## 🚀 Installation

1.  **Clone & Install**

    ```bash
    git clone <repo-url>
    cd beesist
    composer install
    npm install
    ```

2.  **Environment Setup**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

3.  **Database**
    Configure your DB credentials in `.env`, then run:

    ```bash
    php artisan migrate --seed
    ```

4.  **Local Server**
    ```bash
    npm run dev
    php artisan serve
    ```

## 👨‍💻 Development

### Command Cheatsheet

**Modules**

```bash
# Create a new module
php artisan module:make <ModuleName>

# Generate a Model + Migration + Controller + Request in a Module
php artisan module:make-model <ModelName> -mcr <ModuleName>

# Generate a Livewire Component in a Module
php artisan module:make-livewire <ComponentName> <ModuleName>
```

**Troubleshooting Livewire in Modules**
If `MakeCommand` is not found, ensure `Livewire\Commands\MakeCommand` is imported in `vendor\mhmiton\laravel-modules-livewire\src\Traits\CommandHelper.php`.

### Default Credentials (Seeded)

- **Admin**: `admin@admin.com` / `secret`
- **User**: `user@user.com` / `secret`

### Payment Testing (Stripe)

- **Success Card**: `4000 0000 0000 3220`
- **3D Secure**: `4000 0025 0000 3155`

## 🤝 Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct and the process for submitting pull requests.

## 📄 License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.
