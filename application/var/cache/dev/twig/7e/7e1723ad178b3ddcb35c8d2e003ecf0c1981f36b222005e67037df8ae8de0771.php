<?php

/* @Framework/Form/form_rest.html.php */
class __TwigTemplate_b75eeb0fe4be56dc3f4ea20986f91375c94b942c01533d38dd313619b46144d7 extends Twig_Template
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
        $__internal_bcd5c75614c6afa1ef2e5385eeb7436b46664268fb72605b35ffed0f086d1bbe = $this->env->getExtension("native_profiler");
        $__internal_bcd5c75614c6afa1ef2e5385eeb7436b46664268fb72605b35ffed0f086d1bbe->enter($__internal_bcd5c75614c6afa1ef2e5385eeb7436b46664268fb72605b35ffed0f086d1bbe_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_rest.html.php"));

        // line 1
        echo "<?php foreach (\$form as \$child): ?>
    <?php if (!\$child->isRendered()): ?>
        <?php echo \$view['form']->row(\$child) ?>
    <?php endif; ?>
<?php endforeach; ?>
";
        
        $__internal_bcd5c75614c6afa1ef2e5385eeb7436b46664268fb72605b35ffed0f086d1bbe->leave($__internal_bcd5c75614c6afa1ef2e5385eeb7436b46664268fb72605b35ffed0f086d1bbe_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_rest.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php foreach ($form as $child): ?>*/
/*     <?php if (!$child->isRendered()): ?>*/
/*         <?php echo $view['form']->row($child) ?>*/
/*     <?php endif; ?>*/
/* <?php endforeach; ?>*/
/* */
