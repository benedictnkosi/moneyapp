<?php

/* @Framework/Form/time_widget.html.php */
class __TwigTemplate_8cdd6bb54c745716034297f7cfe1e662f81db3f9415592e0f136133fd7f1ad25 extends Twig_Template
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
        $__internal_f57a89162dc924a1f89f52945b4c1265e3e4660e3eadb88915d4760052b1ec04 = $this->env->getExtension("native_profiler");
        $__internal_f57a89162dc924a1f89f52945b4c1265e3e4660e3eadb88915d4760052b1ec04->enter($__internal_f57a89162dc924a1f89f52945b4c1265e3e4660e3eadb88915d4760052b1ec04_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/time_widget.html.php"));

        // line 1
        echo "<?php if (\$widget == 'single_text'): ?>
    <?php echo \$view['form']->block(\$form, 'form_widget_simple'); ?>
<?php else: ?>
    <?php \$vars = \$widget == 'text' ? array('attr' => array('size' => 1)) : array() ?>
    <div <?php echo \$view['form']->block(\$form, 'widget_container_attributes') ?>>
        <?php
            // There should be no spaces between the colons and the widgets, that's why
            // this block is written in a single PHP tag
            echo \$view['form']->widget(\$form['hour'], \$vars);

            if (\$with_minutes) {
                echo ':';
                echo \$view['form']->widget(\$form['minute'], \$vars);
            }

            if (\$with_seconds) {
                echo ':';
                echo \$view['form']->widget(\$form['second'], \$vars);
            }
        ?>
    </div>
<?php endif ?>
";
        
        $__internal_f57a89162dc924a1f89f52945b4c1265e3e4660e3eadb88915d4760052b1ec04->leave($__internal_f57a89162dc924a1f89f52945b4c1265e3e4660e3eadb88915d4760052b1ec04_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/time_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if ($widget == 'single_text'): ?>*/
/*     <?php echo $view['form']->block($form, 'form_widget_simple'); ?>*/
/* <?php else: ?>*/
/*     <?php $vars = $widget == 'text' ? array('attr' => array('size' => 1)) : array() ?>*/
/*     <div <?php echo $view['form']->block($form, 'widget_container_attributes') ?>>*/
/*         <?php*/
/*             // There should be no spaces between the colons and the widgets, that's why*/
/*             // this block is written in a single PHP tag*/
/*             echo $view['form']->widget($form['hour'], $vars);*/
/* */
/*             if ($with_minutes) {*/
/*                 echo ':';*/
/*                 echo $view['form']->widget($form['minute'], $vars);*/
/*             }*/
/* */
/*             if ($with_seconds) {*/
/*                 echo ':';*/
/*                 echo $view['form']->widget($form['second'], $vars);*/
/*             }*/
/*         ?>*/
/*     </div>*/
/* <?php endif ?>*/
/* */
