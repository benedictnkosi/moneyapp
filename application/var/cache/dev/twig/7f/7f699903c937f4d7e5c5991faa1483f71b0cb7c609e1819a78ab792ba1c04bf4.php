<?php

/* @Framework/Form/textarea_widget.html.php */
class __TwigTemplate_fe91dae638f39016ac26e667f9e12067d2134214c30e26be52a5efe9613e17f6 extends Twig_Template
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
        $__internal_9943ca4dc56683275a5d7ad0e9e7ed9ea5402135461034ade3d0577bc5189dc1 = $this->env->getExtension("native_profiler");
        $__internal_9943ca4dc56683275a5d7ad0e9e7ed9ea5402135461034ade3d0577bc5189dc1->enter($__internal_9943ca4dc56683275a5d7ad0e9e7ed9ea5402135461034ade3d0577bc5189dc1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/textarea_widget.html.php"));

        // line 1
        echo "<textarea <?php echo \$view['form']->block(\$form, 'widget_attributes') ?>><?php echo \$view->escape(\$value) ?></textarea>
";
        
        $__internal_9943ca4dc56683275a5d7ad0e9e7ed9ea5402135461034ade3d0577bc5189dc1->leave($__internal_9943ca4dc56683275a5d7ad0e9e7ed9ea5402135461034ade3d0577bc5189dc1_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/textarea_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <textarea <?php echo $view['form']->block($form, 'widget_attributes') ?>><?php echo $view->escape($value) ?></textarea>*/
/* */
