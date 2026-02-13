# DeliveryFast

## Installation

### Clone Repository

```bash
git clone https://github.com/growwdigitel-arch/deliveryfast.git
```

### Setup Directory

```bash
cd deliveryfast
cp .env.example .env
```

### Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install
```

### Run Application

```bash
# Generate application key
php artisan key:generate

# Build frontend assets
npm run dev

# Start development server
php artisan serve
```