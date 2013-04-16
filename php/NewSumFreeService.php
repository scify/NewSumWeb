<?php

class getTopicIDs {

    public $sUserSources; // string
    public $sCategory; // string

}

class getTopicIDsResponse {

    public $return; // string

}

class getTopicTitles {

    public $sUserSources; // string
    public $sCategory; // string

}

class getTopicTitlesResponse {

    public $return; // string

}

class getSummary {

    public $sTopicID; // string
    public $sUserSources; // string

}

class getSummaryResponse {

    public $return; // string

}

class getTopicTitlesByID {

    public $sTopicID; // string

}

class getTopicTitlesByIDResponse {

    public $return; // string

}

class getLinkLabels {
    
}

class getLinkLabelsResponse {

    public $return; // string

}

class getCategorySources {

    public $sCategory; // string

}

class getCategorySourcesResponse {

    public $return; // string

}

class getCategories {

    public $sUserSources; // string

}

class getCategoriesResponse {

    public $return; // string

}

class getSecondLevelSeparator {
    
}

class getSecondLevelSeparatorResponse {

    public $return; // string

}

class getThirdLevelSeparator {
    
}

class getThirdLevelSeparatorResponse {

    public $return; // string

}

class getTopicIDsByKeyword {

    public $sKeyword; // string
    public $sUserSources; // string

}

class getTopicIDsByKeywordResponse {

    public $return; // string

}

class getFirstLevelSeparator {
    
}

class getFirstLevelSeparatorResponse {

    public $return; // string

}

class getTopicTitlesByIDs {

    public $sTopicIDs; // string

}

class getTopicTitlesByIDsResponse {

    public $return; // string

}

class getLinkLabelsFromFile {
    
}

class getLinkLabelsFromFileResponse {

    public $return; // string

}

/**
 * NewSumFreeService class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class NewSumFreeService extends SoapClient {

    private static $classmap = array(
        'getTopicIDs' => 'getTopicIDs',
        'getTopicIDsResponse' => 'getTopicIDsResponse',
        'getTopicTitles' => 'getTopicTitles',
        'getTopicTitlesResponse' => 'getTopicTitlesResponse',
        'getSummary' => 'getSummary',
        'getSummaryResponse' => 'getSummaryResponse',
        'getTopicTitlesByID' => 'getTopicTitlesByID',
        'getTopicTitlesByIDResponse' => 'getTopicTitlesByIDResponse',
        'getLinkLabels' => 'getLinkLabels',
        'getLinkLabelsResponse' => 'getLinkLabelsResponse',
        'getCategorySources' => 'getCategorySources',
        'getCategorySourcesResponse' => 'getCategorySourcesResponse',
        'getCategories' => 'getCategories',
        'getCategoriesResponse' => 'getCategoriesResponse',
        'getSecondLevelSeparator' => 'getSecondLevelSeparator',
        'getSecondLevelSeparatorResponse' => 'getSecondLevelSeparatorResponse',
        'getThirdLevelSeparator' => 'getThirdLevelSeparator',
        'getThirdLevelSeparatorResponse' => 'getThirdLevelSeparatorResponse',
        'getTopicIDsByKeyword' => 'getTopicIDsByKeyword',
        'getTopicIDsByKeywordResponse' => 'getTopicIDsByKeywordResponse',
        'getFirstLevelSeparator' => 'getFirstLevelSeparator',
        'getFirstLevelSeparatorResponse' => 'getFirstLevelSeparatorResponse',
        'getTopicTitlesByIDs' => 'getTopicTitlesByIDs',
        'getTopicTitlesByIDsResponse' => 'getTopicTitlesByIDsResponse',
        'getLinkLabelsFromFile' => 'getLinkLabelsFromFile',
        'getLinkLabelsFromFileResponse' => 'getLinkLabelsFromFileResponse',
    );

    public function NewSumFreeService($wsdl = "http://143.233.226.97:34957/NewSumFreeService/NewSumFreeService?wsdl", $options = array()) {
        foreach (self::$classmap as $key => $value) {
            if (!isset($options['classmap'][$key])) {
                $options['classmap'][$key] = $value;
            }
        }
        parent::__construct($wsdl, $options);
    }

    /**
     *  
     *
     * @param getCategories $parameters
     * @return getCategoriesResponse
     */
    public function getCategories(getCategories $parameters) {
        return $this->__soapCall('getCategories', array($parameters), array(
                    'uri' => 'http://NewSumFreeService.Server.NewSumServer.scify.org/',
                    'soapaction' => ''
                        )
        );
    }

    /**
     *  
     *
     * @param getLinkLabelsFromFile $parameters
     * @return getLinkLabelsFromFileResponse
     */
    public function getLinkLabelsFromFile(getLinkLabelsFromFile $parameters) {
        return $this->__soapCall('getLinkLabelsFromFile', array($parameters), array(
                    'uri' => 'http://NewSumFreeService.Server.NewSumServer.scify.org/',
                    'soapaction' => ''
                        )
        );
    }

    /**
     *  
     *
     * @param getTopicTitlesByID $parameters
     * @return getTopicTitlesByIDResponse
     */
    public function getTopicTitlesByID(getTopicTitlesByID $parameters) {
        return $this->__soapCall('getTopicTitlesByID', array($parameters), array(
                    'uri' => 'http://NewSumFreeService.Server.NewSumServer.scify.org/',
                    'soapaction' => ''
                        )
        );
    }

    /**
     *  
     *
     * @param getTopicIDs $parameters
     * @return getTopicIDsResponse
     */
    public function getTopicIDs(getTopicIDs $parameters) {
        return $this->__soapCall('getTopicIDs', array($parameters), array(
                    'uri' => 'http://NewSumFreeService.Server.NewSumServer.scify.org/',
                    'soapaction' => ''
                        )
        );
    }

    /**
     *  
     *
     * @param getTopicIDsByKeyword $parameters
     * @return getTopicIDsByKeywordResponse
     */
    public function getTopicIDsByKeyword(getTopicIDsByKeyword $parameters) {
        return $this->__soapCall('getTopicIDsByKeyword', array($parameters), array(
                    'uri' => 'http://NewSumFreeService.Server.NewSumServer.scify.org/',
                    'soapaction' => ''
                        )
        );
    }

    /**
     *  
     *
     * @param getLinkLabels $parameters
     * @return getLinkLabelsResponse
     */
    public function getLinkLabels(getLinkLabels $parameters) {
        return $this->__soapCall('getLinkLabels', array($parameters), array(
                    'uri' => 'http://NewSumFreeService.Server.NewSumServer.scify.org/',
                    'soapaction' => ''
                        )
        );
    }

    /**
     *  
     *
     * @param getSecondLevelSeparator $parameters
     * @return getSecondLevelSeparatorResponse
     */
    public function getSecondLevelSeparator(getSecondLevelSeparator $parameters) {
        return $this->__soapCall('getSecondLevelSeparator', array($parameters), array(
                    'uri' => 'http://NewSumFreeService.Server.NewSumServer.scify.org/',
                    'soapaction' => ''
                        )
        );
    }
    
      /**
     *  
     *
     * @param getThirdLevelSeparator $parameters
     * @return getThirdSeparatorResponse
     */
    public function getThirdLevelSeparator(getThirdLevelSeparator $parameters) {
        return $this->__soapCall('getThirdLevelSeparator', array($parameters), array(
                    'uri' => 'http://NewSumFreeService.Server.NewSumServer.scify.org/',
                    'soapaction' => ''
                        )
        );
    }

    /**
     *  
     *
     * @param getCategorySources $parameters
     * @return getCategorySourcesResponse
     */
    public function getCategorySources(getCategorySources $parameters) {
        return $this->__soapCall('getCategorySources', array($parameters), array(
                    'uri' => 'http://NewSumFreeService.Server.NewSumServer.scify.org/',
                    'soapaction' => ''
                        )
        );
    }

    /**
     *  
     *
     * @param getTopicTitles $parameters
     * @return getTopicTitlesResponse
     */
    public function getTopicTitles(getTopicTitles $parameters) {
        return $this->__soapCall('getTopicTitles', array($parameters), array(
                    'uri' => 'http://NewSumFreeService.Server.NewSumServer.scify.org/',
                    'soapaction' => ''
                        )
        );
    }

    /**
     *  
     *
     * @param getSummary $parameters
     * @return getSummaryResponse
     */
    public function getSummary(getSummary $parameters) {
        return $this->__soapCall('getSummary', array($parameters), array(
                    'uri' => 'http://NewSumFreeService.Server.NewSumServer.scify.org/',
                    'soapaction' => ''
                        )
        );
    }

    /**
     *  
     *
     * @param getTopicTitlesByIDs $parameters
     * @return getTopicTitlesByIDsResponse
     */
    public function getTopicTitlesByIDs(getTopicTitlesByIDs $parameters) {
        return $this->__soapCall('getTopicTitlesByIDs', array($parameters), array(
                    'uri' => 'http://NewSumFreeService.Server.NewSumServer.scify.org/',
                    'soapaction' => ''
                        )
        );
    }

    /**
     *  
     *
     * @param getFirstLevelSeparator $parameters
     * @return getFirstLevelSeparatorResponse
     */
    public function getFirstLevelSeparator(getFirstLevelSeparator $parameters) {
        return $this->__soapCall('getFirstLevelSeparator', array($parameters), array(
                    'uri' => 'http://NewSumFreeService.Server.NewSumServer.scify.org/',
                    'soapaction' => ''
                        )
        );
    }

}

?>
