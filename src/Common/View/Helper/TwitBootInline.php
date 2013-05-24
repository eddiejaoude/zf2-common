<?php
namespace Common\View\Helper;

use Zend\Stdlib\DateTime;
use Zend\View\Helper\AbstractHelper;

class Form extends AbstractHelper
{

    /**
     * Required for view helper
     *
     * @return Form
     */
    public function __invoke()
    {
        return $this;
    }

    /**
     * Wraps original call with twitter bootstrap form helper
     *
     * @param string $method
     * @param array $args
     * @return string
     */
    public function __call($method, $args)
    {
        $field = $args[0];

        $view = '<div class="control-group' . $this->isError($field) . '">';
        $view .= '<label class="control-label" for="' . $field->getAttribute('name') . '">' . $field->getOption('label') . '</label>';
        $view .= '<div class="controls">';
        $view .= $this->getView()->{$method}($field);
        $view .= $this->getView()->formElementErrors()
            ->setMessageOpenFormat('<span class="help-inline">')
            ->setMessageSeparatorString(', ')
            ->setMessageCloseString('</span>')
            ->render($field);
        $view .= '</div>';
        $view .= '</div>';

        return $view;
    }

    /**
     * Checks for field error
     *
     * @param Form $field
     * @return string
     */
    public function isError($field)
    {
        $error = $this->getView()->formElementErrors()->render($field);
        if (!empty($error)) {
            return ' error';
        }

        return '';
    }



}
