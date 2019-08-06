<?php

/* @Framework/Form/checkbox_widget.html.php */
class __TwigTemplate_a0f4567ebeb754aabbe1e6f7072b68a1ddff3293d553d94a95394beebe5c3375 extends Twig_Template
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
        $__internal_278bdea1679a63bb1d8d5a1e6c3a19cd2abc506bc57d635ac12652e686c7c1d5 = $this->env->getExtension("native_profiler");
        $__internal_278bdea1679a63bb1d8d5a1e6c3a19cd2abc506bc57d635ac12652e686c7c1d5->enter($__internal_278bdea1679a63bb1d8d5a1e6c3a19cd2abc506bc57d635ac12652e686c7c1d5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/checkbox_widget.html.php"));

        // line 1
        echo "<input type=\"checkbox\"
    <?php echo \$view['form']->block(\$form, 'widget_attributes') ?>
    <?php if (strlen(\$value) > 0): ?> value=\"<?php echo \$view->escape(\$value) ?>\"<?php endif ?>
    <?php if (\$checked): ?> checked=\"checked\"<?php endif ?>
/>
";
        
        $__internal_278bdea1679a63bb1d8d5a1e6c3a19cd2abc506bc57d635ac12652e686c7c1d5->leave($__internal_278bdea1679a63bb1d8d5a1e6c3a19cd2abc506bc57d635ac12652e686c7c1d5_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/checkbox_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <input type="checkbox"*/
/*     <?php echo $view['form']->block($form, 'widget_attributes') ?>*/
/*     <?php if (strlen($value) > 0): ?> value="<?php echo $view->escape($value) ?>"<?php endif ?>*/
/*     <?php if ($checked): ?> checked="checked"<?php endif ?>*/
/* />*/
/* */
