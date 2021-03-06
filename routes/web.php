<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/



// this Routes belongs to admin panle
Route::group(['prefix'=>'/admin' , 'namespace'=>'Admin' , 'middleware'=>['adminAuth']] , function(){

		/*Dashboard*/
		Route::get('/dashboard/{id?}','DashboardController@Index')->name('Admin_Dashboard');
		Route::post('/check-comment','DashboardController@checkComment')->name('Check_Comment');
		Route::get('/delete-comment/{id}','DashboardController@deleteComment')->name('Delete_Comment');		

		//History
			Route::get('/history','HistoryPlanPurposeController@getHistory')->name('Get_History');
			Route::post('/history','HistoryPlanPurposeController@editHistory');

		/* Purpose */
		Route::group(['prefix'=>'/purpose'],function(){
			Route::get('/','HistoryPlanPurposeController@getPurpose')->name('Get_Purpose');
			Route::get('/new','HistoryPlanPurposeController@newPurpose')->name('New_Purpose');
			Route::post('/new','HistoryPlanPurposeController@createPurpose');
			Route::get('/delete/{id}','HistoryPlanPurposeController@deletePurpose')->name('Delete_Purpose');
			Route::get('/edit/{id}','HistoryPlanPurposeController@editPurposePage')->name('Edit_Page_Purpose');
			Route::post('/edit/{id}','HistoryPlanPurposeController@doEditPurpose');
		});
			
		/* Plan */
		Route::group(['prefix'=>'/plan'],function(){
			Route::get('/','HistoryPlanPurposeController@getPlan')->name('Get_Plan');
			Route::get('/new','HistoryPlanPurposeController@newPlan')->name('New_Plan');
			Route::post('/new','HistoryPlanPurposeController@createPlan');
			Route::get('/delete/{id}','HistoryPlanPurposeController@deletePlan')->name('Delete_Plan');
			Route::get('/edit/{id}','HistoryPlanPurposeController@EditPlan')->name('Edit_Page_Plan');
			Route::post('/edit/{id}','HistoryPlanPurposeController@doEditPlan');
		});
			
		/* Statements */
		Route::group(['prefix' => '/statements' , 'namespace' => 'Statemetns'] , function(){
				
			//Statements
			Route::get('/','StatementsController@getStatementsTitle')->name('Statements_Title');
			Route::get('/new','StatementsController@newStatements')->name('New_Statements');
			Route::post('/new','StatementsController@createNewStatements');
			Route::get('/delete/{id}','StatementsController@deleteStatements')->name('Delete_Statements');
			Route::get('/edit/{id}','StatementsController@editStatementsPage')->name('Edit_Statements');
			Route::post('/edit/{id}','StatementsController@doEditStatements');

			//Statements List
			Route::get('/list/{id}','StatementsListController@getStatementsList')->name('Statements_List');
			Route::get('/list/new/{id}','StatementsListController@createNewStatementsList')->name('Create_New_Statement');
			Route::post('/list/new/{id}','StatementsListController@doCreateNewStatementsList');
			Route::get('/list/delete/{id}','StatementsListController@deleteStatementsList')->name('Delete_Statements_List');
			Route::get('/list/edit/{id}','StatementsListController@editStatementsList')->name('Edit_statements_List');
			Route::post('/list/edit/{id}','StatementsListController@doEditStatementsList');
		});

		/* Ethics */
		Route::group(['prefix'=>'/ethics' , 'namespace' => 'Ethics'],function(){

			//Ethics
			Route::get('/','EthicsController@getEthics')->name('Get_Ethics');
			Route::get('/new','EthicsController@newEthics')->name('New_Ethics');
			Route::post('/new','EthicsController@createEthics');
			Route::get('/delete/{id}','EthicsController@deleteEthics')->name('Delete_Ethics');
			Route::get('/edit/{id}','EthicsController@editEthicsPage')->name('Edit_Ethics');
			Route::post('/edit/{id}','EthicsController@doEditEthics');

			//Ethics Lists
			Route::get('/lists/{id}','EthicsListsController@getEthicsList')->name('Get_Ethics_List');
			Route::get('/lists/new/{id}','EthicsListsController@newEthicsList')->name('New_Ethics_List');
			Route::post('/lists/new/{id}','EthicsListsController@createEthicsList');
			Route::get('/lists/delete/{id}','EthicsListsController@deleteEthicsList')->name('Delete_Ethics_List');
			Route::get('/lists/edit/{id}','EthicsListsController@editEthicsList')->name('Edit_Ethics_List');
			Route::post('/lists/edit/{id}','EthicsListsController@doEditEthicsList');
		});	

		/* Regulations */
		Route::group(['prefix'=>'/regulations','namespace'=>'Regulations'],function(){
			Route::get('/','RegulationsController@getRegulations')->name('Get_Regulations');
			Route::get('/new','RegulationsController@newRegulations')->name('New_Regulations');
			Route::post('/new','RegulationsController@createRegulation')->name('Create_Regulation');
			Route::get('/delete/{id}','RegulationsController@deleteRegulation')->name('Delete_Regulation');
			Route::get('/edit/{id}','RegulationsController@editRegulation')->name('Edit_Regulation');
			Route::post('/edit/{id}','RegulationsController@doEditRegulation');
		});

		/* Authorities */
		Route::group(['prefix' => '/authorities','namespace' => 'Authorities'],function(){
			Route::get('/','AuthoritiesController@getAuthorities')->name('Get_Authorities');
			Route::get('/new','AuthoritiesController@newAuthorities')->name('New_Authorities');
			Route::post('new','AuthoritiesController@createAuthorities');
			Route::get('/edit/{id}','AuthoritiesController@editAuthorities')->name('Edit_Authorities');
			Route::post('/edit/{id}','AuthoritiesController@doEditAuthorities');
			Route::get('/delete/{id}','AuthoritiesController@deleteAuthorities')->name('Delete_Authorities');

			/* Duties */
			Route::group(['prefix'=>'/duty'],function(){
				Route::get('/','DutiesController@getDuties')->name('Get_Duties');
				Route::get('/create/{dutyTitle}','DutiesController@createDuties')->name('Create_Duties');	
				Route::post('/create/{dutyTitle}','DutiesController@doCreateDuties');	
			});
		});

		/* Activities */
		Route::group(['prefix' => '/activity' , 'namespace' => 'Activities'] , function(){
			Route::get('/title','ActionTitleController@getActivityTitle')->name('Get_Activity');
			Route::get('/new','ActionTitleController@newActivityTitle')->name('New_Activity');
			Route::post('/new','ActionTitleController@createActivityTitle');
			Route::get('/delete/{id}' , 'ActionTitleController@deleteActivity')->name('Delete_Activity');
			Route::get('/edit/{id}' , 'ActionTitleController@editActivity')->name('Edit_Activity');
			Route::post('/edit/{id}' , 'ActionTitleController@doEditActivity');

			Route::get('/sub/{id}/{title}' , 'ActionTitleController@subActivity')->name('Sub_Activity');
			Route::get('/sub/create/new/{id}' , 'ActionTitleController@newSubActivity')->name('New_Sub_Activity');
			Route::post('/sub/create/new/{id}' , 'ActionTitleController@createNewSubActivity');
			Route::get('/sub/edit/new/{id}' , 'ActionTitleController@editSubActivity')->name('Edit_Sub_Activity');
			Route::post('/sub/edit/new/{id}' , 'ActionTitleController@doEditSubActivity');
			Route::get('/sub/delete/new/{id}' , 'ActionTitleController@deleteEditSubActivity')->name('Delete_Sub_Activity');
		});

		/* Posts */
		Route::group(['prefix' => '/post' , 'namespace' => 'Activities'] , function(){
			Route::get('/' , 'DoActionController@getPost')->name('Get_Posts');
			Route::get('/new' , 'DoActionController@newPost')->name('New_Posts');
			Route::get('/sub-activity/{id}' , 'DoActionController@getSubActivity')->name('Get_Sub_Activity');
			Route::post('/new' , 'DoActionController@createPost');
			Route::get('/edit/{id}' , 'DoActionController@editPost')->name('Edit_Post');
			Route::post('/edit/{id}' , 'DoActionController@doEditPost')->name('Do_Edit_Post');
			Route::get('/delete/{id}' , 'DoActionController@deletePost')->name('Delete_Post');
			Route::get('/gallery/{id}/{postName}' , 'DoActionController@getPostGallery')->name('Get_Post_Gallery');
			Route::post('/gallery/{id}/{postName}' , 'DoActionController@insertPostGallery')->name('Insert_Post_Gallery');
			Route::get('/gallery/action/delete/{id}' , 'DoActionController@deletePostPicture')->name('Delete_Post_Picture');
			// 
			Route::get('/video/{id}/{postName}' , 'DoActionController@getPostVideo')->name('Get_Post_Video');
			Route::post('/video/{id}/{postName}' , 'DoActionController@uploadVideo');
			// 
			Route::get('/news-gallery/{id}/{postName}' , 'DoActionController@getPostNewsGallery')->name('Get_News_Post_Gallery');
			Route::post('/news-gallery/{id}/{postName}' , 'DoActionController@insertPostNewsGallery')->name('Insert_News_Post_Gallery');
			Route::get('/news-gallery/action/delete/{id}' , 'DoActionController@deletePostNewsPicture')->name('Delete_News_Post_Picture');
			// 
			Route::get('/find/{item}' , 'DoActionController@findPosts');
			Route::get('/search/{item}' , 'DoActionController@searchPosts')->name('Search_Posts');
		});

		/* Forms */
		Route::group(['prefix' => '/forms'] , function(){
			Route::get('/' , 'FormController@getForms')->name('Get_Forms');
			Route::get('/new' , 'FormController@newForm')->name('New_Form');
			Route::post('/new' , 'FormController@createForm')->name('Create_Form');
			Route::get('/delete/{id}' , 'FormController@deleteForm')->name('Delete_Form');
			Route::get('/edit/{id}' , 'FormController@editForm')->name('Edit_Form');
			Route::post('/edit/{id}' , 'FormController@doEditForm')->name('Do_Edit_Form');
		});

		/* News */
		Route::group(['prefix'=>'/news'] , function(){
			Route::get('/' , 'NewsController@getNews')->name('Get_News');
			Route::get('/create' , 'NewsController@createNews')->name('Create_News');
			Route::post('/create' , 'NewsController@doCreateNews')->name('Do_Create_News');
			Route::get('/delete/{id}','NewsController@deleteNews')->name('Delete_News');
			Route::get('/edit/{id}' , 'NewsController@editNews')->name('Edit_News');
			Route::post('/edit/{id}' , 'NewsController@doEditNews')->name('Do_Edit_News');
			Route::get('/find/{item}' , 'NewsController@findNews');
			Route::get('/search/{item}' , 'NewsController@searchNews')->name('Search_news');
		});

		/* Charts */
		Route::group(['prefix'=>'/chart'] , function(){
			Route::get('/' , 'ChartController@getChart')->name('Get_Chart');
			Route::post('/' , 'ChartController@updateChart');
		});

		/* Users */
		Route::group(['prefix'=>'/users'] , function(){
			Route::get('/' , 'UserController@getUsers')->name('Get_User');
			Route::get('/create' , 'UserController@createUsers')->name('Create_User');
			Route::post('/create' , 'UserController@doCreateUser');
			Route::get('/edit/{id}' , 'UserController@editUser')->name('Edit_User');
			Route::post('/edit/{id}' , 'UserController@doEditUser');
			Route::get('/delete/{id}' , 'UserController@deleteUser')->name('Delete_User');
			Route::get('/find/{item}' , 'UserController@findUser');
			Route::get('/search/{item}' , 'UserController@searchUser');
			Route::get('change/status/{id}/{value}' , 'UserController@changeStatus');
		});

		/* Scores */
		Route::group(['prefix' => '/score'] , function(){
			Route::get('/' , 'UserScoreController@getUserScore')->name('Get_Score');
			Route::get('/new' , 'UserScoreController@newScore')->name('New_Score');
			Route::post('/new' , 'UserScoreController@createScore');
			Route::get('/edit/{id}' , 'UserScoreController@editScore')->name('Edit_Score');
			Route::post('/edit/{id}' , 'UserScoreController@doEditScore');
			Route::get('/delete/{id}' , 'UserScoreController@deleteScore')->name('Delete_Score');
		});

		Route::group(['prefix'=>'/membership'],function(){
			Route::get('/' ,'Membership@getMembers')->name('Get_All_Members');
		});

		/* Representation */
		Route::group(['prefix'=>'/representation', 'namespace'=>'Representation'] , function (){
			Route::get('/' , 'RepresentationController@getRepresentation')->name('Get_Representation');
			Route::get('/create' , 'RepresentationController@createRepresentation')->name('Create_Representation');
			Route::post('/create' , 'RepresentationController@doCreateRepresentation');
			Route::get('/edit/{id}' , 'RepresentationController@editRepresentation')->name('Edit_Representation');
			Route::post('/edit/{id}' , 'RepresentationController@doEditRepresentation');
			Route::get('/history/{id}' , 'RepresentationController@getHistory')->name('Get_Representation_History');
			Route::post('/history/{id}' , 'RepresentationController@createHistory');
			Route::get('/information/{id}' , 'RepresentationController@getInfo')->name('Get_Representation_Info');
			Route::post('/information/{id}' , 'RepresentationController@updateInfo');
			Route::get('/chart/{id}' , 'RepresentationController@getChart')->name('Get_Representation_Chart');
			Route::post('/chart/{id}' , 'RepresentationController@updateChart')->name('Update_Representation_Chart');
			Route::get('/authorities/{id}' , 'RepresentationController@getAuthorities')->name('Get_Representation_Authorities');
			Route::get('/authorities/create/{id}' , 'RepresentationController@createAuthorities')->name('Create_Representation_Authorities');
			Route::post('/authorities/doCreate' , 'RepresentationController@doCreateAuthorities')->name('Do_Create_Representation_Authorities');
			Route::get('/authorities/edit/{id}' , 'RepresentationController@editAuthorities')->name('Edit_Representation_Authorities');
			Route::post('/authorities/edit/{id}' , 'RepresentationController@doEditAuthorities');
			Route::get('/authorities/delete/{cityId}/{id}' , 'RepresentationController@deleteAuthorities')->name('Delete_Representation_Authorities');
			Route::get('authorities/duty/{cityId}/{dutyTitle}' , 'RepresentationController@getDuties')->name('Get_Representation_Duty');
			Route::post('authorities/duty/{cityId}/{dutyTitle}' , 'RepresentationController@doCreateDuties');			
		});

		/* Slider */
		Route::group(['prefix'=>'/slider'],function(){
			Route::get('/','SliderController@getSlides')->name('Get_Slides');
			Route::post('/','SliderController@updateSlides');
			Route::post('/create','SliderController@createSlide')->name('Create_Slide');
			Route::get('/delete/{id}','SliderController@deleteSlide')->name('Delete_Slide');
		});

		/* Comments */
		Route::group(['prefix'=>'/comments'],function(){
			Route::get('/{id?}','CommentsController@getComments')->name('Get_Comments');
			Route::post('/check-comment','CommentsController@checkComment')->name('Check_Comment-Page');
		});

		/* Reports */
		Route::group(['prefix'=>'/reports' , "namespace" => "Reports"],function(){
			Route::get('/{id?}','ReportsController@getAllReports')->name('Get_All_Reports');
			Route::get('/new-report/create','ReportsController@createNewReports')->name('Create_New_Reports');
			Route::post('/new-report/create','ReportsController@doCreateNewReports');
			Route::get('/new-report/edit/{id}','ReportsController@editReports')->name('Edit_Reports');
			Route::post('/new-report/edit/{id}','ReportsController@doEditReports');
			Route::get('/new-report/delete/{id}','ReportsController@deleteReports')->name('Delete_Report');
			Route::get('/new-report/activation/{id}/{activeStatus}','ReportsController@reportActivation')->name('Report_Activation');
			Route::get('/new-report/result/{id}','ReportsController@getQuestionerResult')->name('Get_The_Questioner_Result');
		});
		// Questions
		Route::group(['prefix' => '/questions', "namespace" => "Reports"], function () {
			Route::get('/{id}','QuestionsController@getAllQuestions')->name('Get_All_Questions');
			Route::get('/{id}/create','QuestionsController@createNewQuestions')->name('Create_New_Questions');
			Route::post('/{id}/create','QuestionsController@doCreateQuestions');
			Route::get('/{question_id}/delete/{id}','QuestionsController@deleteQuestion')->name('Delete_Questions');
			Route::get('/{question_id}/edit/{id}','QuestionsController@editQuestion')->name('Edit_Questions');
			Route::POST('/{question_id}/edit/{id}','QuestionsController@doEditQuestion');
		});

		// Recalls
		Route::group(['prefix' => '/recalls', "namespace" => "Recalls"], function () {
			Route::get('/{id?}', 'RecallsController@getRecalls')->name('Get_Recalls');
			Route::get('/new-recall/create','RecallsController@createRecall')->name('Create_Recall_page');
			Route::post('/new-recall/create','RecallsController@doCreateRecall');
			Route::get('/new-recall/edit/{id}','RecallsController@editRecall')->name('Edit_Recalls');
			Route::post('/new-recall/edit/{id}','RecallsController@doEditRecall');
			Route::get('/new-recall/delete/{id}','RecallsController@deleteRecall')->name('Delete_Recall');
			Route::get('/new-recall/activation/{id}/{activeStatus}','RecallsController@recallActivation')->name('Recall_Activation');
		});

		// WHO registerd in recall
		Route::group(['prefix' => '/who-registered' , "namespace" => "Recalls"], function () {
			Route::get('{recalId}/{recallName}/{page?}','WhoRegisterdInRecallController@getWhoRegisterd')->name('Get_All_Bodys');			
		});
		Route::group(['prefix' => 'recall/picture', "namespace" => "Recalls"], function () {
			Route::get('/user-works/{recallId}/{userId}/{name}/{family}','WhoRegisterdInRecallController@getUserWorks')->name('Get_All_Works');			
		});

});

// this Routes belongs to Main Panel
Route::group(['namespace'=>'Main' , 'middleware'=>['menuContent']],function(){
	
	//Home Page
	Route::get('/','IndexController@loadHomePage')->name('Home');
	Route::post('/news-letter-email','IndexController@saveNewsLetterEmails')->name('News_Letter');

	// Mandegar Menu
	Route::group(['namespace' => 'Mandegar'],function(){
		Route::get('/history','MandegarController@getHistoryPlanPurposeStatements')->name('Menu_History');
		Route::get('/plane','MandegarController@getHistoryPlanPurposeStatements')->name('Menu_Plane');
		Route::get('/purpose','MandegarController@getHistoryPlanPurposeStatements')->name('Menu_Purpose');
		Route::get('/statement','MandegarController@getHistoryPlanPurposeStatements')->name('Menu_Statement');
		Route::get('/form','FormController@getForms')->name('Menu_Form');
		Route::get('/regulations','RegulationController@getRegulations')->name('Menu_Regulations');
		Route::get('/ethics','EthicsController@getEthics')->name('Menu_Ethics');
		//نیاز به ریدایرکت 404 دارد
		Route::get('/chart/{cityName}','ChartController@getChart')->name('Menu_Chart');
	});

	//Authorities
	Route::group(['namespace'=>'Authorities'], function () {
		//نیاز به ریدایرکت 404 دارد
		Route::get('/authorities/{title}','AuthoritiesController@getAuthorities')->name('Menu_Authorities');
	});

	//Activities 
	Route::group(['namespace'=>'Activities'],function(){
		//نیاز به ریدایرکت 404 دارد
		Route::get('/activities/{name}/{id?}','ActivitiesController@getAcitivities')->name('Get_Activities');
		Route::get('/read-activity/{id}/','ActivityController@getActivity')->name('Get_Read_Activity');
		Route::post('/read-activity/{id}/','ActivityController@setComment')->name('Set_comment');
		Route::get('/last-activities','LastActivitiesController@getAll')->name('Get_All_Activities');
	});

	//News
	Route::group(['namespace'=>'News'], function () {
		Route::get('/news/{id?}','MainNewsController@getallNews')->name('Get_All_News');
		Route::get('/news-continue-reding/{id}','MainNewsController@continueReading')->name('News_Load_More');
	});

	//Login
	Route::get('/login','LoginController@loginPage')->name('Login');
	Route::post('/login','LoginController@doLogin')->name('Do_Login');
	Route::get('/exit','LoginController@logOut')->name('Exit');
	Route::get('/refreshcaptcha', 'LoginController@refreshCaptcha')->name("Refresh_Capthca_Route");

	// Register
	Route::get('/register','RegisterController@registerPage')->name('Register');
	Route::post('/register','RegisterController@doRegister')->name('Do_register');

	// Forget
	Route::get('/forget','ForgetController@forgetPage')->name('Forget');
	Route::post('/forget','ForgetController@sendInformationToEmail');

	// Representaion
	Route::get('/representaion', 'RepresentaionController@getRepresentation')->name('Representaion');
	Route::get('/representaion-continue-reding/{name}', 'RepresentaionController@representationReadMore')->name('Representaion_Read_More');

	// Membership
	Route::get('/membership','MembershipController@getMembers')->name('Get_Membership');

	// Search
	Route::get('/search/{name}','SearchController@getSearch')->name('Get_Search');
	
	// Recalls
	Route::get('/recall/{id}/{name}','RecallController@getRecalls')->name('Get_Reacll');
	Route::post('/recall/{userId}/{recallId}','RecallController@finallSubmition');
	Route::post('/recall/create-user-information','RecallController@doCreateUserInformation')->name('Do_Create_User_information');
	Route::post('/recall/create-user-work','RecallController@doCreateUserWorks')->name('Do_create_User_Work');
	Route::get('/recall/get-user-works/{userId}/{recallId}','RecallController@getAllUsersPicture')->name('Get_User_Works');
	Route::delete('recall/delete-work/{workId}','RecallController@deleteUserWork')->name('Delete_User_work');

	// Reports
	Route::get('/questionnaire/{questionnaireId}/{name}','ReportsController@getQuestionnaire')->name('Get_Specefic_Questionnaire');
	Route::post('/questionnaire/submition','ReportsController@submitQuestionsForm')->name('Questionnaire_Submition');
});