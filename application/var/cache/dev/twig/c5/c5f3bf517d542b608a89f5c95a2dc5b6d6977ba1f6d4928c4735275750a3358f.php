<?php

/* @Framework/Form/choice_widget_expanded.html.php */
class __TwigTemplate_ebcc5e33dc157f0925b83d70e060b5b0a33b783efdd6a9679191aebf422d65d9 extends Twig_Template
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
        $__internal_b4a1938f3e5e8de9e413bc8fc7b729b56f43b552850c2a51b23ebf6e024bde10 = $this->env->getExtension("native_profiler");
        $__internal_b4a1938f3e5e8de9e413bc8fc7b729b56f43b552850c2a51b23ebf6e024bde10->enter($__internal_b4a1938f3e5e8de9e413bc8fc7b729b56f43b552850c2a51b23ebf6e024bde10_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/choice_widget_expanded.html.php"));

        // line 1
        echo "<div <?php echo \$view['form']->block(\$form, 'widget_container_attributes') ?>>
<?php foreach (\$form as \$child): ?>
    <?php echo \$view['form']->widget(\$child) ?>
    <?php echo \$view['form']->label(\$child, null, array('translation_domain' => \$choice_translation_domain)) ?>
<?php endforeach ?>
</div>
";
        
        $__internal_b4a1938f3e5e8de9e413bc8fc7b729b56f43b552850c2a51b23ebf6e024bde10->leave($__internal_b4a1938f3e5e8de9e413bc8fc7b729b56f43b552850c2a51b23ebf6e024bde10_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/choice_widget_expanded.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <div <?php echo $view['form']->block($form, 'widget_container_attributes') ?>>*/
/* <?php foreach ($form as $child): ?>*/
/*     <?php echo $view['form']->widget($child) ?>*/
/*     <?php echo $view['form']->label($child, null, array('translation_domain' => $choice_translation_domain)) ?>*/
/* <?php endforeach ?>*/
/* </div>*/
/* */
