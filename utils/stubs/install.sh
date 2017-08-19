# clean up
rm -v -r -f phpstorm-stubs locutus

# clone repos
git clone https://github.com/JetBrains/phpstorm-stubs.git
git clone https://github.com/kvz/locutus.git

# build Locutus
npm install --prefix locutus
npm run --prefix locutus build
composer install
echo "Done :-)"