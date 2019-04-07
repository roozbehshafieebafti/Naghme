<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| 
| 
| 
|
*/



// this Routes belongs to admin panle
Route::group(['prefix'=>'/admin' , 'namespace'=>'Admin'] , function(){

		/*Dashboard*/
		Route::get('/','DashboardController@Index')->name('Admin_Dashboard');

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
		});

		/* Forms */
		Route::group(['prefix' => '/forms'] , function(){
			Route::get('/' , 'FormController@getForms')->name('Get_Forms');
		});

});