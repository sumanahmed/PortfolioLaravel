<?php

Route::get('/','MyportfolioController@home');
Route::post('/send-email','MyportfolioController@sendMail');





/*** Contact Controller ***/
Route::get('/add-contact', 'ContactController@addContactInfo');
Route::post('/update-contact', 'ContactController@updateContactInfo');

/*** Section Controller ***/
Route::get('/add-section', 'SectionController@addSectionInfo');
Route::post('/update-section', 'SectionController@updateSectionInfo');


/*** About Controller ***/
Route::get('/add-about', 'AboutController@addAboutInfo');
Route::post('/update-about', 'AboutController@updateAboutInfo');

/*** Skill Controller ***/
Route::get('/add-skill', 'SkillsController@addSkillInfo');
Route::post('/new-skill', 'SkillsController@saveSkillInfo');
Route::get('/manage-skill', 'SkillsController@manageSkillInfo');
Route::get('/unpublished-skill/{id}','SkillsController@unpublishedSkillInfo');
Route::get('/published-skill/{id}','SkillsController@publishedSkillInfo');
Route::get('/edit-skill/{id}', 'SkillsController@editSkillInfo');
Route::post('/update-skill', 'SkillsController@updateSkillInfo');
Route::get('/delete-skill/{id}', 'SkillsController@deleteSkillInfo');


/*** Tag Controller ***/
Route::get('/add-tag','TagController@addTag');
Route::post('/new-tag','TagController@saveTagInfo');
Route::get('/manage-tag','TagController@manageTagInfo');
Route::get('/unpublished-tag/{id}','TagController@unpublishedTagInfo');
Route::get('/published-tag/{id}','TagController@publishedTagInfo');
Route::get('/edit-tag/{id}','TagController@editTagInfo');
Route::post('/update-tag','TagController@updateTagInfo');
Route::get('/delete-tag/{id}','TagController@deleteTagInfo');


/*** Portfolio Controller ***/
Route::get('/add-portfolio', 'PortfolioController@addPortfolioInfo');
Route::post('/new-portfolio', 'PortfolioController@savePortfolioInfo');
Route::get('/manage-portfolio', 'PortfolioController@managePortfolioInfo');
Route::get('/unpublished-portfolio/{id}', 'PortfolioController@unpublishedPortfolioInfo');
Route::get('/published-portfolio/{id}', 'PortfolioController@publishedPortfolioInfo');
Route::get('/edit-portfolio/{id}', 'PortfolioController@editPortfolioInfo');
Route::post('/update-portfolio', 'PortfolioController@updatePortfolioInfo');
Route::get('/delete-portfolio/{id}', 'PortfolioController@deletePortfolioInfo');

/*** Portfolio Controller ***/
Route::get('/add-service', 'ServiceController@addServiceInfo');
Route::post('/new-service', 'ServiceController@saveServiceInfo');
Route::get('/manage-service', 'ServiceController@manageServiceInfo');
Route::get('/unpublished-service/{id}', 'ServiceController@unpublishedServiceInfo');
Route::get('/published-service/{id}', 'ServiceController@publishedServiceInfo');
Route::get('/edit-service/{id}', 'ServiceController@editServiceInfo');
Route::post('/update-service', 'ServiceController@updateServiceInfo');
Route::get('/delete-service/{id}', 'ServiceController@deleteServiceInfo');

/*** Portfolio Controller ***/
Route::get('/add-blog','BlogController@addBlogInfo');
Route::post('/new-blog','BlogController@saveBlogInfo');
Route::get('/manage-blog','BlogController@manageBlogInfo');
Route::get('/unpublished-blog/{id}','BlogController@unpublishedBlogInfo');
Route::get('/published-blog/{id}','BlogController@publishedBlogInfo');
Route::get('/edit-blog/{id}','BlogController@editBlogInfo');
Route::post('/update-blog','BlogController@updateBlogInfo');
Route::get('/delete-blog/{id}','BlogController@deleteBlogInfo');




/******** Auth class ********/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
