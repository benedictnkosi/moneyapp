<?php

/* @Framework/Form/choice_widget.html.php */
class __TwigTemplate_42def915baf6018d8381b3480ed0c1c51a4df45525db2e3c1e9978f38ccb0c0b extends Twig_Template
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
        $__internal_3addf4bcf16713e58e0724d4c6e2047a96de8ddd5044d96a7afb6cff683f6d97 = $this->env->getExtension("native_profiler");
        $__internal_3addf4bcf16713e58e0724d4c6e2047a96de8ddd5044d96a7afb6cff683f6d97->enter($__internal_3addf4bcf16713e58e0724d4c6e2047a96de8ddd5044d96a7afb6cff683f6d97_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/choice_widget.html.php"));

        // line 1
        echo "<?php if (\$expanded): ?>
<?php echo \$view['form']->block(\$form, 'choice_widget_expanded') ?>
<?php else: ?>
<?php echo \$view['form']->block(\$form, 'choice_widget_collapsed') ?>
<?php endif ?>
";
        
        $__internal_3addf4bcf16713e58e0724d4c6e2047a96de8ddd5044d96a7afb6cff683f6d97->leave($__internal_3addf4bcf16713e58e0724d4c6e2047a96de8ddd5044d96a7afb6cff683f6d97_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/choice_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if ($expanded): ?>*/
/* <?php echo $view['form']->block($form, 'choice_widget_expanded') ?>*/
/* <?php else: ?>*/
/* <?php echo $view['form']->block($form, 'choice_widget_collapsed') ?>*/
/* <?php endif ?>*/
/* */
