<?php
$this->breadcrumbs = array(
	$this->module->id,
);
?>
<div class="wrapperMainDefaultdiv" style="text-align: center">
    <h1>Главная страница</h1>

<table class="defaultAdminTable">

    <tr>
        <td>
            <?php
                echo CHtml::ajaxLink (CHtml::button('Authors -> XML'),
                CController::createUrl('default/AuthorToXML'),
                array('update' => '#authors'),
                array('id' => 'authors'));
            ?>
        </td>
        <td>
            <?php
            echo CHtml::ajaxLink (CHtml::button('XML -> Authors'),
                CController::createUrl('default/AuthorXMLtoDB'),
                array('update' => '#authorstoDB'),
                array('id' => 'authorstoDB'));
            ?>
        </td>
        <td>
            <?php
            echo CHtml::Link (CHtml::button('Заполняем Комментариями'),
                CController::createUrl('default/WritingComments'),
                array('update' => '#Writing_comments'),
                array('id' => 'Writing_comments'));
            ?>
        </td>

    </tr>


    <tr>
        <td>
            <?php
            echo CHtml::ajaxLink (CHtml::button('Firm -> XML'),
                CController::createUrl('default/FirmToXML'),
                array('update' => '#Firm'),
                array('id' => 'Firm'));
            ?>
        </td>
        <td>
            <?php
            echo CHtml::ajaxLink (CHtml::button('XML -> Firm'),
                CController::createUrl('default/FirmXMLtoDB'),
                array('update' => '#FirmtoDB'),
                array('id' => 'FirmtoDB'));
            ?>
        </td>
        <td>
            <?php
            echo CHtml::Link (CHtml::button('Подсчитать Рейтинг'),
                CController::createUrl('default/UpdatingReiting'),
                array('update' => '#UpdatingReiting'),
                array('id' => 'UpdatingReiting'));
            ?>
        </td>
    </tr>


    <tr>
        <td>
            <?php
            echo CHtml::ajaxLink (CHtml::button('SubCategories -> XML'),
                CController::createUrl('default/SubCategoriesToXML'),
                array('update' => '#SubCategories'),
                array('id' => 'SubCategories'));
            ?>
        </td>
        <td>
            <?php
            echo CHtml::ajaxLink (CHtml::button('XML -> SubCategories'),
                CController::createUrl('default/SubCategoriesXMLtoDB'),
                array('update' => '#SubCategoriestoDB'),
                array('id' => 'SubCategoriestoDB'));
            ?>
        </td>
    </tr>

    <tr>
        <td>
            <?php
            echo CHtml::ajaxLink (CHtml::button('Categories -> XML'),
                CController::createUrl('default/CategoriesToXML'),
                array('update' => '#Categories'),
                array('id' => 'Categories'));
            ?>
        </td>
        <td>
            <?php
            echo CHtml::ajaxLink (CHtml::button('XML -> Categories'),
                CController::createUrl('default/CategoriesXMLtoDB'),
                array('update' => '#CategoriestoDB'),
                array('id' => 'CategoriestoDB'));
            ?>
        </td>
    </tr>

    <tr>
        <td>
            <?php
            echo CHtml::ajaxLink (CHtml::button('Orders -> XML'),
                CController::createUrl('default/OrdersToXML'),
                array('update' => '#Orders'),
                array('id' => 'Orders'));
            ?>
        </td>
        <td>
            <?php
            echo CHtml::ajaxLink (CHtml::button('XML -> Orders '),
                CController::createUrl('default/OrderXMLtoDB'),
                array('update' => '#OrderstoDB'),
                array('id' => 'OrderstoDB'));
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php
            echo CHtml::ajaxLink (CHtml::button('Pictures -> XML'),
                CController::createUrl('default/PicturesToXML'),
                array('update' => '#Pictures'),
                array('id' => 'Pictures'));
            ?>
        </td>
        <td>
            <?php
            echo CHtml::ajaxLink (CHtml::button('XML -> Pictures'),
                CController::createUrl('default/PicturesXMLtoDB'),
                array('update' => '#PicturestoDB'),
                array('id' => 'PicturestoDB'));
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php
            echo CHtml::ajaxLink (CHtml::button('User -> XML'),
                CController::createUrl('default/UserToXML'),
                array('update' => '#User'),
                array('id' => 'User'));
            ?>
        </td>
        <td>
            <?php
            echo CHtml::ajaxLink (CHtml::button('XML -> User '),
                CController::createUrl('default/UserXMLtoDB'),
                array('update' => '#UsertoDB'),
                array('id' => 'UsertoDB'));
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php
            echo CHtml::ajaxLink (CHtml::button('Product -> XML'),
                CController::createUrl('default/ProductToXML'),
                array('update' => '#Product'),
                array('id' => 'Product'));
            ?>
        </td>
        <td>
            <?php
            echo CHtml::ajaxLink (CHtml::button('XML -> Product'),
                CController::createUrl('default/ProductXMLtoDB'),
                array('update' => '#ProducttoDB'),
                array('id' => 'ProducttoDB'));
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php
            echo CHtml::ajaxLink (CHtml::button('Properties -> XML'),
                CController::createUrl('default/PropertiesToXML'),
                array('update' => '#PropertiesToXML'),
                array('id' => 'PropertiesToXML'));
            ?>
        </td>
        <td>
            <?php
            echo CHtml::ajaxLink (CHtml::button('XML -> Properties'),
                CController::createUrl('default/PropertiesXMLToDB'),
                array('update' => '#PropertiesXMLToDB'),
                array('id' => 'PropertiesXMLToDB'));
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php
            echo CHtml::ajaxLink (CHtml::button('PropertiesList -> XML'),
                CController::createUrl('default/PropertiesListToXML'),
                array('update' => '#PropertiesListToXML'),
                array('id' => 'PropertiesListToXML'));
            ?>
        </td>
        <td>
            <?php
            echo CHtml::ajaxLink (CHtml::button('XML -> PropertiesList'),
                CController::createUrl('default/PropertiesListXMLtoDB'),
                array('update' => '#PropertiesListtoDB'),
                array('id' => 'PropertiesListtoDB'));
            ?>
        </td>
    </tr>
</table>
</div>