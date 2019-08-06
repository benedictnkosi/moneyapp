<?php

/* @Framework/FormTable/form_row.html.php */
class __TwigTemplate_48712c3869f9518b3e43753341bd9debde6cac91f72f2d65552f698f4561eae9 extends Twig_Template
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
        $__internal_3994dc6a577173f85045458b64a50cf4ba9990b4b2c5681f83559b6c76de6112 = $this->env->getExtension("native_profiler");
        $__internal_3994dc6a577173f85045458b64a50cf4ba9990b4b2c5681f83559b6c76de6112->enter($__internal_3994dc6a577173f85045458b64a50cf4ba9990b4b2c5681f83559b6c76de6112_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/FormTable/form_row.html.php"));

        // line 1
        echo "<tr>
    <td>
        <?php echo \$view['form']->label(\$form) ?>
    </td>
    <td>
        <?php echo \$view['form']->errors(\$form) ?>
        <?php echo \$view['form']->widget(\$form) ?>
    </td>
</tr>
";
        
        $__internal_3994dc6a577173f85045458b64a50cf4ba9990b4b2c5681f83559b6c76de6112->leave($__internal_3994dc6a577173f85045458b64a50cf4ba9990b4b2c5681f83559b6c76de6112_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/FormTable/form_row.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <tr>*/
/*     <td>*/
/*         <?php echo $view['form']->label($form) ?>*/
/*     </td>*/
/*     <td>*/
/*         <?php echo $view['form']->errors($form) ?>*/
/*         <?php echo $view['form']->widget($form) ?>*/
/*     </td>*/
/* </tr>*/
/* */
