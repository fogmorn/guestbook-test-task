# guestbook-test-task
Guest book using Laravel with DataTables
## Requirements
 - vagrant `>= 2.1.2`
 - virtualbox `>= 5.2.14`

## Installation
Clone project `git clone https://github.com/fogmorn/guestbook-test-task.git`

Installing The Homestead Vagrant Box  
```
vagrant box add laravel/homestead
```
    
Installing Homestead  
```
git clone https://github.com/laravel/homestead.git ~/Homestead
cd ~/Homestead 
bash init.sh # Mac / Linux
init.bat # Windows
```

Edit `Homestead.yaml`, define path to project:  
```
folders:
  - map: /path-to-guestbook-test-task
```
  
Install `vagrant-vbguest`:  
```
vagrant plugin install vagrant-vbguest
```
Run vagrant box `vagrant up --provision`  
> If you facing the error that your vagrant is old,
simply decrease required vagrant version in `Vagrantfile`.
 
Edit your `hosts` file, add string `192.168.10.10 homestead.test`
  
## Fill database with data
Enter into vagrant VM `vagrant ssh`  
 
Amount of database entries you can define in `database/seeds/EntryTableSeeder.php` (currently 500 entries).
```
factory(App\Entry::class, 500)->create()->make();
```
 
Create database and fill it:
```
cd ~/code
php artisan migrate
php artisan db:seed
```

## Using
Open your browser and go to http://homestead.test/entry
