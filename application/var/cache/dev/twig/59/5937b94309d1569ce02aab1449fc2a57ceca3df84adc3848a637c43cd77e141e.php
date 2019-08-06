<?php

/* @Framework/Form/form.html.php */
class __TwigTemplate_8a8c50e8d91cc82a65f4f807c6f01e5c41798effb7b4d105055b02b0552a41ab extends Twig_Template
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
        $__internal_5128a974dcc5bc16ff72c77894f46219b62b507f0ae8b8509ae06a108a64184c = $this->env->getExtension("native_profiler");
        $__internal_5128a974dcc5bc16ff72c77894f46219b62b507f0ae8b8509ae06a108a64184c->enter($__internal_5128a974dcc5bc16ff72c77894f46219b62b507f0ae8b8509ae06a108a64184c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form.html.php"));

        // line 1
        echo "<?php echo \$view['form']->start(\$form) ?>
    <?php echo \$view['form']->widget(\$form) ?>
<?php echo \$view['form']->end(\$form) ?>
";
        
        $__internal_5128a974dcc5bc16ff72c77894f46219b62b507f0ae8b8509ae06a108a64184c->leave($__internal_5128a974dcc5bc16ff72c77894f46219b62b507f0ae8b8509ae06a108a64184c_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php echo $view['form']->start($form) ?>*/
/*     <?php echo $view['form']->widget($form) ?>*/
/* <?php echo $view['form']->end($form) ?>*/
/* */
