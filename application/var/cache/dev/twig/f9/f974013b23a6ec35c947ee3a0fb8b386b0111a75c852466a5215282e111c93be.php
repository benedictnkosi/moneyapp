<?php

/* @Framework/Form/form_widget_simple.html.php */
class __TwigTemplate_365c99b413c710b7812681ba178c53e56e55a15693fb177eb815ae6ab3abd9be extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_fb06289bba277ba14d74f680d25c8ae9fcabbe49010a42359ff5ad24e7153985 = $this->env->getExtension("native_profiler");
        $__internal_fb06289bba277ba14d74f680d25c8ae9fcabbe49010a42359ff5ad24e7153985->enter($__internal_fb06289bba277ba14d74f680d25c8ae9fcabbe49010a42359ff5ad24e7153985_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_widget_simple.html.php"));

        // line 1
        echo "<input type=\"<?php echo isset(\$type) ? \$view->escape(\$type) : 'text' ?>\" <?php echo \$view['form']->block(\$form, 'widget_attributes') ?><?php if (!empty(\$value) || is_numeric(\$value)): ?> value=\"<?php echo \$view->escape(\$value) ?>\"<?php endif ?> />
";
        
        $__internal_fb06289bba277ba14d74f680d25c8ae9fcabbe49010a42359ff5ad24e7153985->leave($__internal_fb06289bba277ba14d74f680d25c8ae9fcabbe49010a42359ff5ad24e7153985_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_widget_simple.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <input type="<?php echo isset($type) ? $view->escape($type) : 'text' ?>" <?php echo $view['form']->block($form, 'widget_attributes') ?><?php if (!empty($value) || is_numeric($value)): ?> value="<?php echo $view->escape($value) ?>"<?php endif ?> />*/
/* */
