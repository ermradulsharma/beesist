# Contributing to Beesist

First off, thank you for considering contributing to Beesist! It's people like you who make this a great tool for the community.

## 🏗 Development Workflow

Beesist uses a **Modular Monolith** architecture. When adding new features, please consider if they belong in an existing module or if a new module should be created.

### 1. Working with Modules

- All new features should ideally reside in the `Modules/` directory.
- Use artisan commands to generate module components:

    ```bash
    php artisan module:make-controller <ControllerName> <ModuleName>
    php artisan module:make-model <ModelName> <ModuleName>
    ```

- Avoid deep coupling between modules. Use events or service classes for cross-module communication.

### 2. Branching & Pull Requests

1. Fork the repository and create your branch from `main`.
2. If you've added code that should be tested, add tests.
3. Ensure the test suite passes (`php artisan test`).
4. Format your code using `php-cs-fixer`:

    ```bash
    vendor/bin/php-cs-fixer fix
    ```

5. Issue that pull request!

## 🛠 Coding Standards

- **PSR-12**: We strictly follow the PSR-12 coding standard.
- **Type Hinting**: Use strict typing and return type hints wherever possible.
- **Naming**: Use descriptive names for variables, functions, and classes.
- **Blade & Livewire**: Use anonymous blade components for UI elements and keeps Livewire components focused on a single responsibility.

## 🧪 Testing

We aim for high test coverage across all modules.

- **Feature Tests**: Place in `tests/Feature` or within your module's `Tests/Feature` directory.
- **Unit Tests**: Place in `tests/Unit`.

---

## 🐞 Bug Reports

- Use the GitHub issue tracker.
- Provide a clear, descriptive title.
- Include steps to reproduce the issue.
- Mention your environment (PHP version, OS, etc.).

## 💡 Feature Requests

- Open an issue and describe the proposed change.
- Explain the use case and why it benefits the project.

We appreciate your help in making Beesist better!
