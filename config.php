
<?php 
/**
 * IMPORTANT: Use this file to set the custom info in the study.
 * Any data that will be consistently used across all items are defined here. Think of this like defaults and global info. 
 * Go through each of these sections when you set-up your study.
 */

define('ROOT_DIRECTORY', dirname(__FILE__));

// Load the config file
$configFile = file_get_contents(ROOT_DIRECTORY.'/config.json');
$config = json_decode($configFile, true);
 /**
  * 1. What is the name of the directory you'll use when you upload this to thenewsbeat.org? 
  *    If you'll be at thenewsbeat.org/2019-reporter-biographies/, enter '2019-reporter-biographies'
  */
define('NEWSBEAT_DIRECTORY_NAME', $config['newsbeatDirectoryName']);
/**
 * 2. What is the prefix for your study? This will be used in the comment logging and creating people's unique user IDs.
 *    This will get stored to their localStorage and used from there after the first time. So, if you update it, you'll need 
 *    to clear your localStorage to see the effect.
 */
define('STUDY_PREFIX',  $config['studyPrefix']);

define('IS_DEV', "$_SERVER[HTTP_HOST]" !== 'thegazettestar.com');

define('DIST_URL', IS_DEV ? "https://$_SERVER[HTTP_HOST]/dist" : "https://$_SERVER[HTTP_HOST]/".NEWSBEAT_DIRECTORY_NAME."/dist");

function getConfigVariation($variationKey) {
    foreach($config['variations'] as $val) {
        if($variationKey === $key) {
            return $val;
        }
    }

    return false;
}

function getVarsByGetKey($GET) {
    global $config;
    foreach($config['variations'] as $val) {
        if($val['GET'] === $GET) {
            return $val;
        }
    }

    return false;
}

/**
 * In this config example, we’ll need five versions of each article:
 * 
 * 1. No bio, only a byline                 /
 * 2. Personal photo with personal bio      /?author_photo=personal&author_bio=personal
 * 3. Personal photo with basic bio         /?author_photo=personal&author_bio=basic
 * 4. Professional photo with personal bio  /?author_photo=professional&author_bio=personal
 * 5. Professional photo with basic bio     /?author_photo=professional&author_bio=basic
 */


/**
 * 3. Set the query parameters that will define the variations of the study.
 *    This could be something like:
 *       - using a photo or not: /?photo=true
 *       - varying a template: /?template=trust
 *       - multiple things at once: /?tempalate=trust&author_photo=professional
 *    
 *    Set the values based on your potential $_GET values. The keys in the arrays below should match
 *    the valid $_GET values for your parameters. So, if you do /?author_photo=personal, there should 
 *    be a key in your $authorPhotos array for 'personal'
 */

$variations = array();
// Get all the potential values
// foreach($config['variations'] as $key => $val) {
//     if(isset($_GET[$val['GET']['key']])) {
//         $GETKeyVal = $_GET[$val['GET']['key']];
//         // check if this value is set as a valid GET Key value in the JSON array
//         if(!isset($val['GET']['values'][$GETKeyVal])) {
//             die($GETKeyVal .' is not a valid value for '.$val['GET']['key']);
//         }
//         // we have a value, so set it
//         $variations[$val['id']] = array(
//             'GETKeyVal' => $GETKeyVal,
//             'value' =>   $val['GET']['values'][$GETKeyVal]
//         );
//     } else {
//         // use the default
//         // $variations[$val['id']] = array(
//         //     'GETKeyVal' => 'default',
//         //     'value' =>   $val['GET']['values']['default']
//         // );
//         die('Missing a valid parameter for '.$val['GET']['key']);

//     }
// }

foreach($config['variations'] as $configVar) {
    // set variation to false at the beginning of the loop
    $variation = false;

    // if it's required, then make sure it's there and fail if not
    if(!isset($_GET[$configVar['GET']])) {
        if($configVar['required']) {
            die('Missing a valid parameter for '.$configVar['GET']);
        }
        continue;
    }

    // find this $_GET key
    $GETKeyVal = $_GET[$configVar['GET']];

    // check each of the vars for this variation
    foreach($configVar['vars'] as $var) {
        // if we have a regex pattern, check by regex
        if((isset($var['regex']) && $var['regex']) ) {
            if(preg_match($var['key'], $GETKeyVal)) {
                // this is a regex and the passed value
                // set this $configVar info
                $variation = array(
                    // used when building the identifier
                    'id' => $var['id'],
                    'key' => $GETKeyVal,
                    // value for this constant. Since the regex matched, use the passed value
                    'value' => $GETKeyVal
                    
                );
                break;
            }
        } else if ($GETKeyVal === $var['key']) {
            $variation = array(
                // used when building the identifier
                'id' => $var['id'],
                'key' => $var['key'],
                // value for this variation
                'value' => $var['value']
            );
            break;
        }
    }
    
    // if the variation never got set, then throw an error
    if($variation === false) {
        die($GETKeyVal .' is not a valid value for '.$configVar['GET']);
    } else {
        // we have a value, so set it
        $variations[$configVar['id']] = $variation;
    }
}

/**
 * 4. Set the identifier for each variation of the study.
 *    This is used to send to the log which variation of the study is being used. 
 */
$identifier = '';
if(!empty($variations)) {
    foreach($variations as $key => $variation) {
        // build the identifier. the value for controls will be "default"
        $identifier .= (!empty($identifier) ? '_' : '') . $key .'_'. $variation['key'];
    }
}

// IMPORTANT: This is always necessary for every study.
define('IDENTIFIER', $identifier);





/**
 * 5. Set the constants for the articles. These can be based on the $_GET values or just a simple string/bool value. 
 *    These are used to display the articles.
 */

//  Set our variation constants
foreach($config['variations'] as $val) {
    if(isset($variations[$val['id']])) {
        define($val['constant'], $variations[$val['id']]['value']);
    }
    
}

// set the rest of the possible constants
$constants = array(
    'SITE_NAME'     => $config['siteName'],
    'TEMPLATE_PATH' => dirname(__FILE__).$config['templatePath'],
    'AUTHOR_NAME'   => $config['article']['author']['name'],
    'AUTHOR_BIO'    => $config['article']['author']['bio'],
    'AUTHOR_PHOTO'  => DIST_URL."/img/".$config['article']['author']['image']['src'],
    'AUTHOR_PHOTO_ALT' => $config['article']['author']['image']['alt'],
    'PUBDATE'       => $config['article']['pubdate']
);

foreach($constants as $key => $val) {
    if(!defined($key)) {
        define($key, $val);
    }
}

/**
 * 6. NEXT STEPS: All done with the config! Now go and set all the constants you defined for the 
 * study wherever they need to get set. The main files you'll likely touch:
 * 
 * 1. /articles/path-to-article/data.php - the "database" for the article
 * 2. /articles/includes/main.php - the article template file
 * 3. /article-list.html - the list of possible article links to make it easy for everyone to review
 */


// include the functions file
include ('inc/functions.php');