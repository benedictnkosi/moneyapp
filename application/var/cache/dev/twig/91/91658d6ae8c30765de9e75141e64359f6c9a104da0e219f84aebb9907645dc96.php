<?php

/* @Framework/Form/form_end.html.php */
class __TwigTemplate_798b3276d0884e527125c2919260d21658d002fec6d20d08ac27bdc23018e9db extends Twig_Template
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
        $__internal_9c5066e0b548982ced02301bf28a29e8eb9692f16c95b923d361f172200881e4 = $this->env->getExtension("native_profiler");
        $__internal_9c5066e0b548982ced02301bf28a29e8eb9692f16c95b923d361f172200881e4->enter($__internal_9c5066e0b548982ced02301bf28a29e8eb9692f16c95b923d361f172200881e4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_end.html.php"));

        // line 1
        echo "<?php if (!isset(\$render_rest) || \$render_rest): ?>
<?php echo \$view['form']->rest(\$form) ?>
<?php endif ?>
</form>
";
        
        $__internal_9c5066e0b548982ced02301bf28a29e8eb9692f16c95b923d361f172200881e4->leave($__internal_9c5066e0b548982ced02301bf28a29e8eb9692f16c95b923d361f172200881e4_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_end.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if (!isset($render_rest) || $render_rest): ?>*/
/* <?php echo $view['form']->rest($form) ?>*/
/* <?php endif ?>*/
/* </form>*/
/* */
