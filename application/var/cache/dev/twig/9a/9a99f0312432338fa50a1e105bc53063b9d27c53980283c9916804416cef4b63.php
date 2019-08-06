<?php

/* @Framework/Form/form_widget_compound.html.php */
class __TwigTemplate_bfb1c71e8ad48653edf237a7c3c3a254a06c85b88c89c68e4a09344b03012bf4 extends Twig_Template
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
        $__internal_023993e17a7207a4f29894d536aaee1a2479942c586fa68307b20d36110d874b = $this->env->getExtension("native_profiler");
        $__internal_023993e17a7207a4f29894d536aaee1a2479942c586fa68307b20d36110d874b->enter($__internal_023993e17a7207a4f29894d536aaee1a2479942c586fa68307b20d36110d874b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_widget_compound.html.php"));

        // line 1
        echo "<div <?php echo \$view['form']->block(\$form, 'widget_container_attributes') ?>>
    <?php if (!\$form->parent && \$errors): ?>
    <?php echo \$view['form']->errors(\$form) ?>
    <?php endif ?>
    <?php echo \$view['form']->block(\$form, 'form_rows') ?>
    <?php echo \$view['form']->rest(\$form) ?>
</div>
";
        
        $__internal_023993e17a7207a4f29894d536aaee1a2479942c586fa68307b20d36110d874b->leave($__internal_023993e17a7207a4f29894d536aaee1a2479942c586fa68307b20d36110d874b_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_widget_compound.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <div <?php echo $view['form']->block($form, 'widget_container_attributes') ?>>*/
/*     <?php if (!$form->parent && $errors): ?>*/
/*     <?php echo $view['form']->errors($form) ?>*/
/*     <?php endif ?>*/
/*     <?php echo $view['form']->block($form, 'form_rows') ?>*/
/*     <?php echo $view['form']->rest($form) ?>*/
/* </div>*/
/* */
