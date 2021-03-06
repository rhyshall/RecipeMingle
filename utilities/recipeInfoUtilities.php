<?php
/******************************************************************************************
*******************************************************************************************
** Name: recipeInfoUtilities.php													   ****
** Description: Provides helper functions for "recipeInfoController.php"			   ****
** Author: Rhys Hall																   ****
** Date Created: 06/03/2016														   	   ****
*******************************************************************************************
******************************************************************************************/

$root = $_SERVER["DOCUMENT_ROOT"] . "/RecipeFish/";

/****
 ** Loads the recipe info input page
 **
 **/
function reEnterInput()
{
	//go back to recipe info input 
	header("Location: http://localhost/RecipeFish/view/addRecipeInfo.php"); 
	exit(); 
}

/****
 ** Determines if char in recipe name entered by user is valid 
 **
 ** @param    char  $symbol  recipe name char
 ** @return    boolean  recipe name symbol validity
 **/
 function isValidNameSymbol($symbol)
 {
	 $isValidSymbol = true;
	 
	 if ((ctype_alpha($symbol) == false) && (ctype_digit($symbol) == false) && (ctype_space($symbol) == false) && ($symbol != '-') && ($symbol != '\''))
	 {
		 $isValidSymbol = false;
	 }
	 
	 return $isValidSymbol;
 }
 
 /****
 ** Determines if recipe name symbols are valid
 **
 ** @param    str  $name  recipe name
 ** @return    boolean  recipe name symbols validity
 **/
 function isValidNameSymbols($name)
 {
	$isValid = true;
	
	$length = strlen($name);
	
	//determine if recipe name contains appropriate symbols
	for ($i = 0; $i < $length; $i++)
	{
		if (isValidNameSymbol($name[$i]) == false)
		{
			$isValid = false;
			
			break;
		}
	}
	
	return $isValid;
 }
 
  /****
 ** Determines if recipe name length is valid
 **
 ** @param    str  $name  recipe name
 ** @return    boolean  recipe name length validity
 **/
 function isValidNameLength($name)
 {
	$isValid = true;

	$length = strlen($name);
	
	if (($length < 1) || ($length > 40))
	{
		$isValid = false;
	}
	
	return $isValid;
 }
 
 /****
 ** Determines if recipe description length is valid
 **
 ** @param    str  $description  recipe description
 ** @return    boolean  recipe description length validity
 **/
 function isValidDescriptionLength($description)
 {
	$isValid = true;
	
	$length = strlen($description);
	
	if (($length < 1) || ($length > 500))
	{
		$isValid = false;
	}
	
	return $isValid;
 }
 
 /****
 ** Determines if recipe image file upload is image type
 **
 ** @param    str  $tempFileName  temporary filename stored on server
 ** @return    boolean  image type validity
 **/
 function isImageType($tempFileName)
 {
	$isImage = true;
	
    // Check if image file is actual image type
    $check = getimagesize($tempFileName);
	
    if ($check === false) 
	{
        $isImage = false;
	}
	
	return $isImage;
 }
 
  /****
 ** Determines if recipe image file upload has appropriate size dimensions 
 **
 ** @param    str  $tempFileName  temporary filename stored on server
 ** @return    boolean  image size validity
 **/
 function validImageSize($tempFileName)
 {
	$validSize = true;
	
    // Check if image file is valid size
    $imageStats = getimagesize($tempFileName);
	
	//invalid if height or width < 256px or > 1024px
    if (($imageStats[0] < 256) || ($imageStats[1] < 256) || ($imageStats[0] > 1280) || ($imageStats[1] > 1280))
	{
        $validSize = false;
	}
	
	return $validSize;
 }
?>
