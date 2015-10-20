<?php
namespace AppBundle\Extension;

class PerformanceTwigExtension extends \Twig_Extension
{

    public function getFunctions()
    {
        return array(
            'performance_exectime' => new \Twig_Function_Method($this, 'getExecTime')
        );
    }

    public function getExecTime()
    {
        if (!isset($GLOBALS['PerformanceTwigExtensionMicrotime'])) {
            return 0;
        }

        $durationInMilliseconds = (microtime(true) - $GLOBALS['PerformanceTwigExtensionMicrotime']) * 1000;
        return number_format($durationInMilliseconds, 3, '.', '');
    }

    public function getName()
    {
        return "performance_extension";
    }

}