### Set up
#### Start
* clone repository
* cd to repository directory

#### Backend
Developed against php version 8.4.1
* cd `love2shop_api`
* run `composer install` to install requirements
* run `php artisan migrate` to generate database, select "yes" if asked to create database
* run `php artisan serve` to run server locally (should serve on `localhost:8000`)

##### Frontend
Developed against node LTS (24.12.0)
* cd `love2shop_client`
* run `npm install` to install dependencies
* run `npm run dev` to serve application, should be available at `localhost:5173`

### Improvements:
* Authentication: at present the API and FE have no authentication scheme, this should be implemented as a middleware on the API and provide some authentication API.
* Data model: as it stands, the data model for the basic order system is incomplete, which means that this implementation does not fully leverage Laravel's capability for creating models in relations.
* Use Laravel resource classes to control presentation of data through the API.  Here I have used `toArray` for speed, but this is not ideal.
* App design: the actual graphical design of the app is very basic (uses default Vue sample app styles), which is far from ideal.
* Provide an order delete function in the frontend.  The API supports this but there is no provision in the FE.
* Provide an order create function in the frontend.  Again, this is supported in the API, but the frontend has no UI for it.
* Vue3 features: this implementation does not make use of the most recent Vue3 features and syntactic sugars.

### Challenges
* Overall as implemented there was little to actually prove a challenge in this task, the only thing that got in my way was restricting myself to ~2 hours to keep to task requirements.
