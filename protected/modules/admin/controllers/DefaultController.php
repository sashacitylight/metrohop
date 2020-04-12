<?php

class DefaultController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','create','update','delete',
                    'FirmXMLtoDB','FirmToXML',
                    'SubCategoriesXMLtoDB', 'SubCategoriesToXML',
                    'CategoriesToXML','CategoriesXMLtoDB',
                    'ProductToXML','ProductXMLtoDB',
                    'UserToXML','UserXMLtoDB',
                    'PicturesToXML','PicturesXMLtoDB',
                    'OrderXMLtoDB','OrdersToXML',
                    'CommentsToXML','CommentsXMLtoDB',
                    'AuthorToXML','AuthorXMLtoDB',
                    'Writing_comments','UpdatingReiting',
                    'PropertiesToXML','PropertiesXMLToDB',
                    'PropertiesListToXML','PropertiesListXMLtoDB',
                ),

                'roles'=>array('2'),
            ),

            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
	public function actionIndex()
	{
		$this->render('index');
	}

   public function actionAuthorToXML(){
       $model = Author::model()->findAll();
       $cXml = new CXML('authors');
       foreach($model as $model){
           $cXml->emptyTag('author');
           $cXml->valueTag('id', $model->id);
           $cXml->valueTag('Name', $model->Name);
           $cXml->valueTag('bio', $model->bio);
           $cXml->valueTag('AuthorArtUrl', $model->AuthorArtUrl);
           $cXml->save('authors.xml');
       }
       print_r('authors.xml Успешно создан!');
       return;
   }

   public function actionFirmToXML(){
       $model = Firm::model()->findAll();
       $cXml = new CXML('firms');
       foreach($model as $model){
           $cXml->emptyTag('firm');
           $cXml->valueTag('id', $model->id);
           $cXml->valueTag('firmName', $model->firmName);
           $cXml->valueTag('firmState', $model->firmState);
           $cXml->valueTag('firmFio', $model->firmFio);
           $cXml->valueTag('firmTime', $model->firmTime);
           $cXml->valueTag('firmPrice', $model->firmPrice);
           $cXml->valueTag('firmService', $model->firmService);
           $cXml->valueTag('firmInfo', $model->firmInfo);
           $cXml->save('firms.xml');
       }
       print_r('Firm.xml Успешно создан!');
       return;
   }

    public function actionSubCategoriesToXML(){
        $model = SubCategories::model()->findAll();
        $cXml = new CXML('SubCategories');
        foreach($model as $model){
            $cXml->emptyTag('SubCategory');
            $cXml->valueTag('id', $model->id);
            $cXml->valueTag('Name', $model->Name);
            $cXml->valueTag('Description', $model->Description);
            $cXml->valueTag('catID', $model->catID);
            $cXml->save('SubCategories.xml');
        }
        print_r('SubCategories.xml Успешно создан!');
        return;
    }

    public function actionCategoriesToXML(){
        $model = Categories::model()->findAll();
        $cXml = new CXML('Categories');
        foreach($model as $model){
            $cXml->emptyTag('Category');
            $cXml->valueTag('id', $model->id);
            $cXml->valueTag('name', $model->name);
            $cXml->save('Categories.xml');
        }
        print_r('Categories.xml Успешно создан!');
        return;
    }


    public function actionOrdersToXML(){
        $model = Order::model()->findAll();
        $cXml = new CXML('Orders');
        foreach($model as $model){
            $cXml->emptyTag('Order');
            $cXml->valueTag('id', $model->id);
            $cXml->valueTag('userID', $model->userID);
            $cXml->valueTag('username', $model->username);
            $cXml->valueTag('created', $model->created);
            $cXml->valueTag('email', $model->email);
            $cXml->valueTag('telefone', $model->telefone);
            $cXml->valueTag('adress', $model->adress);
            $cXml->valueTag('productID', $model->productID);

            $cXml->valueTag('number', $model->number);
            $cXml->save('Orders.xml');
        }
        print_r('Order.xml Успешно создан!');
        return;
    }

    public function actionPicturesToXML(){
        $model = Pictures::model()->findAll();
        $cXml = new CXML('Pictures');
        foreach($model as $model){
            $cXml->emptyTag('Picture');
            $cXml->valueTag('id', $model->id);
            $cXml->valueTag('picProductID', $model->picProductID);
            $cXml->valueTag('picUrl', $model->picUrl);
            $cXml->save('Pictures.xml');
        }
        print_r('Pictures.xml Успешно создан!');
        return;
    }

    public function actionPropertiesToXML(){
        $model = ProductProperties::model()->findAll();
        $cXml = new CXML('Properties');
        foreach($model as $model){
            $cXml->emptyTag('Property');
            $cXml->valueTag('id', $model->id);
            $cXml->valueTag('feature1', $model->feature1);
            $cXml->valueTag('feature2', $model->feature2);
            $cXml->save('Properties.xml');
        }
        print_r('Properties.xml Успешно создан!');
        return;
    }


    public function actionPropertiesListToXML(){
        $model = ProductPropertiesList::model()->findAll();
        $cXml = new CXML('PropertyList');
        foreach($model as $model){
            $cXml->emptyTag('Property');
            $cXml->valueTag('id', $model->id);
            $cXml->valueTag('ProductID', $model->ProductID);
            $cXml->valueTag('propertiesID', $model->propertiesID);
            $cXml->valueTag('number', $model->number);
            $cXml->save('PropertiesList.xml');
        }
        print_r('PropertiesList.xml Успешно создан!');
        return;
    }



    public function actionUserToXML(){
        $model = User::model()->findAll();
        $cXml = new CXML('Users');
        foreach($model as $model){
            $cXml->emptyTag('User');
            $cXml->valueTag('id', $model->id);
            $cXml->valueTag('username', $model->username);
            $cXml->valueTag('name', $model->name);
            $cXml->valueTag('telefon', $model->telefon);
            $cXml->valueTag('email', $model->email);
            $cXml->valueTag('password', $model->password);
            $cXml->valueTag('role', $model->role);
            $cXml->valueTag('ban', $model->ban);
            $cXml->valueTag('adress', $model->adress);
            $cXml->valueTag('userCreated', $model->userCreated);
            $cXml->save('Users.xml');
        }
        print_r('User.xml Успешно создан!');
        return;
    }

    public function actionProductToXML(){
        $model = Product::model()->findAll();
        $cXml = new CXML('Products');
        foreach($model as $model){
            $cXml->emptyTag('Product');
            $cXml->valueTag('id', $model->id);
            $cXml->valueTag('SubCategoriesId', $model->SubCategoriesId);
            $cXml->valueTag('AuthorId', $model->AuthorId);
            $cXml->valueTag('Title', $model->Title);
            $cXml->valueTag('Price', $model->Price);
            $cXml->valueTag('ProductArtUrl', $model->ProductArtUrl);
            $cXml->valueTag('pFirmID', $model->pFirmID);
            $cXml->valueTag('AdditionalInfo', $model->AdditionalInfo);
            $cXml->valueTag('ToolId', $model->ToolId);
            $cXml->valueTag('pDiscount', $model->pDiscount);
            $cXml->valueTag('pNumberOrders', $model->pNumberOrders);
            $cXml->valueTag('overallRating', $model->overallRating);
            $cXml->valueTag('pCommentsNumber', $model->pCommentsNumber);
            $cXml->save('Products.xml');
        }
        print_r('Product.xml Успешно создан!');
        return;
    }





    public function actionAuthorXMLtoDB()
    {
        ///считываем файл XML authors.xml в таблицу Authors
        $doc = new DOMDocument();
        $dirPath = dirname(Yii::app()->request->scriptFile).'/XML/authors.xml';
        $doc->load($dirPath);
        $tag = $doc->getElementsByTagName( "author" );

        foreach( $tag as $tags )
        {
            $column = $tags->getElementsByTagName( "id" );
            $id = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("Name");
            $Name = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("bio");
            $bio = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("AuthorArtUrl");
            $AuthorArtUrl = $column->item(0)->nodeValue;

            $model = Author::model()->findByPk($id);
            if(isset($model)){
                $model->id = $id;
                $model->Name = $Name;
                $model->bio = $bio;
                $model->AuthorArtUrl = $AuthorArtUrl;
                $model->update();
            }
            else
            {
                $model = new Author();
                $model->setAttributes(array(
                    'id' => $id,
                    'Name'=>$Name,
                    'bio' => $bio,
                    'AuthorArtUrl' => $AuthorArtUrl,
                ), false);
                $model->save(false);
            }
        }
        print_r('Таблица Author успешно заполнена!');
        return;
    }

    public function actionFirmXMLtoDB()
    {
        ///считываем файл XML firms.xml в таблицу Firms
        $doc = new DOMDocument();
        $dirPath = dirname(Yii::app()->request->scriptFile).'/XML/firms.xml';
        $doc->load($dirPath);

        $tag = $doc->getElementsByTagName( "firm" );

        foreach( $tag as $tags )
        {
            $column = $tags->getElementsByTagName( "id" );
            $id = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("firmName");
            $firmName = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("firmState");
            $firmState = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("firmFio");
            $firmFio = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName( "firmTime" );
            $firmTime = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("firmPrice");
            $firmPrice = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("firmService");
            $firmService = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("firmInfo");
            $firmInfo = $column->item(0)->nodeValue;

            $model = Firm::model()->findByPk($id);
            if(isset($model)){
                $model->id = $id;
                $model->firmName = $firmName;
                $model->firmState = $firmState;
                $model->firmFio = $firmFio;
                $model->firmTime = $firmTime;
                $model->firmPrice = $firmPrice;
                $model->firmService = $firmService;
                $model->firmInfo = $firmInfo;
                $model->update();
            }
            else
            {
                $model = new Firm();
                $model->setAttributes(array(
                    'id' => $id,
                    'firmName'=>$firmName,
                    'firmState' => $firmState,
                    'firmFio' => $firmFio,
                    'firmTime' => $firmTime,
                    'firmPrice'=>$firmPrice,
                    'firmService' => $firmService,
                    'firmInfo' => $firmInfo,
                ), false);
                $model->save(false);
            }
        }
        print_r('Таблица Firm успешно заполнена!');
        return;
    }

    public function actionSubCategoriesXMLtoDB()
    {
        ///считываем файл XML SubCategories.xml в таблицу SubCategories
        $doc = new DOMDocument();
        $dirPath = dirname(Yii::app()->request->scriptFile).'/XML/SubCategories.xml';
        $doc->load($dirPath);

        $tag = $doc->getElementsByTagName( "SubCategory" );

        foreach( $tag as $tags )
        {
            $column = $tags->getElementsByTagName( "id" );
            $id = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("Name");
            $Name = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("Description");
            $Description = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("catID");
            $catID = $column->item(0)->nodeValue;



            $model = SubCategories::model()->findByPk($id);
            if(isset($model)){
                $model->id = $id;
                $model->Name = $Name;
                $model->Description = $Description;
                $model->catID = $catID;
                $model->update();
            }
            else
            {
                $model = new SubCategories();
                $model->setAttributes(array(
                    'id' => $id,
                    'Name'=>$Name,
                    'Description' => $Description,
                    'catID' => $catID,
                ), false);
                $model->save(false);
            }
        }
        print_r('Таблица SubCategories успешно заполнена!');
        return;
    }

    public function actionCategoriesXMLtoDB()
    {
        ///считываем файл XML Categories.xml в таблицу Categories
        $doc = new DOMDocument();
        $dirPath = dirname(Yii::app()->request->scriptFile).'/XML/Categories.xml';
        $doc->load($dirPath);

        $tag = $doc->getElementsByTagName( "Category" );

        foreach( $tag as $tags )
        {
            $column = $tags->getElementsByTagName( "id" );
            $id = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("name");
            $name = $column->item(0)->nodeValue;

            $model = Categories::model()->findByPk($id);
            if(isset($model)){
                $model->id = $id;
                $model->name = $name;
                $model->update();
            }
            else
            {
                $model = new Categories();
                $model->setAttributes(array(
                    'id' => $id,
                    'name'=>$name,
                ), false);
                $model->save(false);
            }
        }
        print_r('Таблица Categories успешно заполнена!');
        return;
    }

    public function actionProductXMLtoDB()
    {
        ///считываем файл XML Products.xml в таблицу Products
        $doc = new DOMDocument();
        $dirPath = dirname(Yii::app()->request->scriptFile).'/XML/Products.xml';
        $doc->load($dirPath);

        $tag = $doc->getElementsByTagName( "Product" );

        foreach( $tag as $tags )
        {
            $column = $tags->getElementsByTagName( "id" );
            $id = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("SubCategoriesId");
            $SubCategoriesId = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("AuthorId");
            $AuthorId = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("Title");
            $Title = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName( "Price" );
            $Price = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName( "ProductArtUrl" );
            $ProductArtUrl = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName( "pFirmID" );
            $pFirmID = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName( "AdditionalInfo" );
            $AdditionalInfo = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName( "ToolId" );
            $ToolId = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName( "pDiscount" );
            $pDiscount = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName( "pNumberOrders" );
            $pNumberOrders = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName( "overallRating" );
            $overallRating = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName( "pCommentsNumber" );
            $pCommentsNumber = $column->item(0)->nodeValue;


            $model = Product::model()->findByPk($id);
            if(isset($model)){
                $model->id = $id;
                $model->SubCategoriesId = $SubCategoriesId;
                $model->AuthorId = $AuthorId;
                $model->Title = $Title;
                $model->Price = $Price;
                $model->ProductArtUrl =$ProductArtUrl;
                $model->pFirmID = $pFirmID;
                $model->AdditionalInfo = $AdditionalInfo;
                $model->ToolId = $ToolId;
                $model->pDiscount = $pDiscount;
                $model->pNumberOrders = $pNumberOrders;
                $model->overallRating =$overallRating;
                $model->pCommentsNumber = $pCommentsNumber;
                $model->update();
            }
            else
            {
                $model = new Product();
                $model->setAttributes(array(
                    'id' => $id,
                    'SubCategoriesId'=>$SubCategoriesId,
                    'AuthorId' => $AuthorId,
                    'Title' => $Title,
                    'Price' => $Price,
                    'ProductArtUrl'=>$ProductArtUrl,
                    'pFirmID' => $pFirmID,
                    'AdditionalInfo' => $AdditionalInfo,
                    'ToolId' => $ToolId,
                    'pDiscount'=>$pDiscount,
                    'pNumberOrders' => $pNumberOrders,
                    'overallRating' => $overallRating,
                    'pCommentsNumber' => $pCommentsNumber,

                ), false);
                $model->save(false);
            }
        }
        print_r('Таблица Product успешно заполнена!');
        return;
    }

    public function actionOrderXMLtoDB()
    {
        ///считываем файл XML Orders.xml в таблицу Orders
        $doc = new DOMDocument();
        $dirPath = dirname(Yii::app()->request->scriptFile).'/XML/Orders.xml';
        $doc->load($dirPath);

        $tag = $doc->getElementsByTagName( "Order" );

        foreach( $tag as $tags )
        {
            $column = $tags->getElementsByTagName( "id" );
            $id = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("userID");
            $userID = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("username");
            $username = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("created");
            $created = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName( "email" );
            $email = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName( "telefone" );
            $telefone = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName( "adress" );
            $adress = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName( "productID" );
            $productID = $column->item(0)->nodeValue;





            $column = $tags->getElementsByTagName( "number" );
            $number = $column->item(0)->nodeValue;


            $model = Order::model()->findByPk($id);
            if(isset($model)){
                $model->id = $id;
                $model->userID = $userID;
                $model->username = $username;
                $model->created = $created;
                $model->email = $email;
                $model->telefone =$telefone;
                $model->adress = $adress;
                $model->productID = $productID;


                $model->number = $number;
                $model->update();
            }
            else
            {
                $model = new Order();
                $model->setAttributes(array(
                    'id' => $id,
                    'userID'=>$userID,
                    'username' => $username,
                    'created' => $created,
                    'email' => $email,
                    'telefone'=>$telefone,
                    'adress' =>$adress,
                    'productID' => $productID,


                    'number' => $number,
                ), false);
                $model->save(false);
            }
        }
        print_r('Таблица Order успешно заполнена!');
        return;
    }

    public function actionUserXMLtoDB()
    {
        ///считываем файл XML firms.xml в таблицу Firms
        $doc = new DOMDocument();
        $dirPath = dirname(Yii::app()->request->scriptFile).'/XML/Users.xml';
        $doc->load($dirPath);

        $tag = $doc->getElementsByTagName( "User" );

        foreach( $tag as $tags )
        {
            $column = $tags->getElementsByTagName( "id" );
            $id = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("username");
            $username = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("name");
            $name = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("telefon");
            $telefon = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName( "email" );
            $email = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("password");
            $password = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("role");
            $role = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("ban");
            $ban = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("adress");
            $adress = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("userCreated");
            $userCreated = $column->item(0)->nodeValue;

            $model = User::model()->findByPk($id);
            if(isset($model)){
                $model->id = $id;
                $model->username = $username;
                $model->name = $name;
                $model->telefon = $telefon;
                $model->email = $email;
                $model->password = $password;
                $model->role = $role;
                $model->ban = $ban;
                $model->adress = $adress;
                $model->userCreated = $userCreated;
                $model->update();
            }
            else
            {
                $model = new User();
                $model->setAttributes(array(
                    'id' => $id,
                    'username'=>$username,
                    'name' => $name,
                    'telefon' => $telefon,
                    'email' => $email,
                    'password'=>$password,
                    'role' => $role,
                    'ban' => $ban,
                    'adress' => $adress,
                    'userCreated' => $userCreated,
                ), false);
                $model->save(false);
            }
        }
        print_r('Таблица User успешно заполнена!');
        return;
    }

    public function actionPicturesXMLtoDB()
    {
        ///считываем файл XML authors.xml в таблицу Authors
        $doc = new DOMDocument();
        $dirPath = dirname(Yii::app()->request->scriptFile).'/XML/Pictures.xml';
        $doc->load($dirPath);
        $tag = $doc->getElementsByTagName( "Picture" );

        foreach( $tag as $tags )
        {
            $column = $tags->getElementsByTagName( "id" );
            $id = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("picProductID");
            $picProductID = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("picUrl");
            $picUrl = $column->item(0)->nodeValue;

            $model = Pictures::model()->findByPk($id);
            if(isset($model)){
                $model->id = $id;
                $model->picProductID = $picProductID;
                $model->picUrl = $picUrl;
                $model->update();
            }
            else
            {
                $model = new Pictures();
                $model->setAttributes(array(
                    'id' => $id,
                    'picProductID'=>$picProductID,
                    'picUrl' => $picUrl,
                ), false);
                $model->save(false);
            }
        }
        print_r('Таблица Pictures успешно заполнена!');
        return;
    }



    public function actionPropertiesXMLToDB()
    {
        ///считываем файл XML authors.xml в таблицу Authors
        $doc = new DOMDocument();
        $dirPath = dirname(Yii::app()->request->scriptFile).'/XML/Properties.xml';
        $doc->load($dirPath);
        $tag = $doc->getElementsByTagName( "Property" );

        foreach( $tag as $tags )
        {
            $column = $tags->getElementsByTagName( "id" );
            $id = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("feature1");
            $feature1 = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("feature2");
            $feature2 = $column->item(0)->nodeValue;

            $model = ProductProperties::model()->findByPk($id);
            if(isset($model)){
                $model->id = $id;
                $model->feature1 = $feature1;
                $model->feature2 = $feature2;
                $model->update();
            }
            else
            {
                $model = new ProductProperties();
                $model->setAttributes(array(
                    'id' => $id,
                    'feature1'=>$feature1,
                    'feature2' => $feature2,
                ), false);
                $model->save(false);
            }
        }
        print_r('Таблица Properties успешно заполнена!');
        return;
    }

    public function actionPropertiesListXMLtoDB()
    {
        ///считываем файл XML authors.xml в таблицу Authors
        $doc = new DOMDocument();
        $dirPath=dirname(Yii::app()->request->scriptFile).'/XML/PropertiesList.xml';
        $doc->load($dirPath);
        $tag = $doc->getElementsByTagName( "PropertyList" );

        foreach( $tag as $tags )
        {
            $column = $tags->getElementsByTagName( "id" );
            $id = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("ProductID");
            $ProductID = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("propertiesID");
            $propertiesID = $column->item(0)->nodeValue;

            $column = $tags->getElementsByTagName("number");
            $number = $column->item(0)->nodeValue;

            $model = ProductPropertiesList::model()->findByPk($id);
            if(isset($model)){
                $model->id = $id;
                $model->ProductID = $ProductID;
                $model->propertiesID = $propertiesID;
                $model->number = $number;
                $model->update();
            }
            else
            {
                $model = new ProductPropertiesList();
                $model->setAttributes(array(
                    'id' => $id,
                    'ProductID'=>$ProductID,
                    'propertiesID' => $propertiesID,
                    'number' => $number,
                ), false);
                $model->save(false);
            }
        }
        print_r('Таблица PropertiesList успешно заполнена!');
        return;
    }

    /////записываем  данные о размерах или типах товаров  таблицы  tbl_tools в tools.XML
    ///////////записываем комментарии для проверки к каждому товару
    public function actionWritingComments()
    {
        $model = Product::model()->findAll();
        $CommentModel = new Comments();

        foreach($model as $models){
            $CommentModel->setAttributes(
                array(
                    'cProductID'=>$models->id,
                    'cName' => 'user11',
                    'created' => time(),
                    'cReiting' => 2,
                    'cText'=>'Доставка,иногда бывает ,что 2 месяца ждать приходить,ну а так минусов не вижу).
                если повезет, то можно сделать более менее удачную покупку.
                не советую покупать более дорогие товары они качественнее не будут. мой горький опыт.',
                ), false);
            $CommentModel->save(false);
        }
        echo 'Успешно!';
    }

    public function actionUpdatingReiting()
    {
        $model = Product::model()->findAll();
        foreach($model as $model){
            $averageRating = 1;
            $summ = 0;
            $CommentModel = Comments::model()->findAllByAttributes(array('cProductID'=>$model->id));
            if(isset($CommentModel)){
                $k = count($CommentModel);
                foreach($CommentModel as $CommentModel){
                    $summ += $CommentModel->cReiting;
                }
                if($k!=0){
                    $averageRating = $summ/$k;
                }
            }
            ///чисто в тестовом режиме заполнение, убрать комменты с %

            ///комментарии убрать
            //$model->overallRating = round($averageRating);
            //$model->update();

        }
        print_r('Рейтинг успешно просчитан!');
        return;
    }

}