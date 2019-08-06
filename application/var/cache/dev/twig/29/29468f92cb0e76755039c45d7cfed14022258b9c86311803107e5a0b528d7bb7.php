<?php

/* @Framework/Form/form_row.html.php */
class __TwigTemplate_a310cace6b90865e5ff5c761e87801f3c6bf01c02f3a9959d2c3efe22b76bfb3 extends Twig_Template
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
        $__internal_7de6bee304ccead4c7758f1453fd06638e6992aff2a4f256a2c7c28178a96d4b = $this->env->getExtension("native_profiler");
        $__internal_7de6bee304ccead4c7758f1453fd06638e6992aff2a4f256a2c7c28178a96d4b->enter($__internal_7de6bee304ccead4c7758f1453fd06638e6992aff2a4f256a2c7c28178a96d4b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_row.html.php"));

        // line 1
        echo "<div>
    <?php echo \$view['form']->label(\$form) ?>
    <?php echo \$view['form']->errors(\$form) ?>
    <?php echo \$view['form']->widget(\$form) ?>
</div>
";
        
        $__internal_7de6bee304ccead4c7758f1453fd06638e6992aff2a4f256a2c7c28178a96d4b->leave($__internal_7de6bee304ccead4c7758f1453fd06638e6992aff2a4f256a2c7c28178a96d4b_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_row.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <div>*/
/*     <?php echo $view['form']->label($form) ?>*/
/*     <?php echo $view['form']->errors($form) ?>*/
/*     <?php echo $view['form']->widget($form) ?>*/
/* </div>*/
/* */
