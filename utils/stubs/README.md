## Install

Make install.sh executable (`chmod +x install.sh`), check that you're OK with what it does, then launch it:

    ./install.sh
    
Alternatively, you can install the thing manually (see below).

## Install manually

### Clone repos
    git clone https://github.com/JetBrains/phpstorm-stubs.git https://github.com/kvz/locutus.git
    git clone https://github.com/kvz/locutus.git

### Build Locutus
    npm install --prefix locutus
    npm run --prefix locutus build
    
### Install deps

    composer install
    
## Run

Run the script:

    php make.php
    
You should end up with stubs for all core PHP functions and tests.

