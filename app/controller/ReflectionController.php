<?php
/**
 * PHP 反射机制
 * User: Jie Liu
 * Date: 2017/6/21
 * Time: 22:20
 */

namespace app\controller;

use app\lib\reflection\Person;
use framework\core\Lua;

class ReflectionController extends BaseController
{

    public function actionT1()
    {
//        $persion = new Person();

        $reflection = new \ReflectionClass('app\lib\reflection\Person');
        var_dump($reflection);

        // 通过反射机制实例化一个对象
        $person = $reflection->newInstance();
        $person_2 = new Person();

        // 通过反射机制获取类的 一组属性 返回 ReflectionProperty 组成的数组
        $properties = $reflection->getProperties();
        //$properties = $reflection->getProperties(\ReflectionProperty::IS_STATIC);
        //$properties = $reflection->getProperties(\ReflectionProperty::IS_PRIVATE | \ReflectionProperty::IS_PROTECTED);

//        var_dump($properties);

        // 通过反射机制获取类的 一个属性 返回 ReflectionProperty
        //$property = $reflection->getProperty('money');

        //$name = $property->getName();   // 返回string

        //var_dump($property, $name);

        # getDocComment 获取写给property 的注释
//        foreach ($properties as $property) {
//            if ($property->isPublic()) {
//                $docblock = $property->getDocComment();
//                var_dump($docblock);
//            }
//        }

        $method = $reflection->getMethod('sayHello');
        // $method   ReflectionMethod
        var_dump($method->name);
        var_dump($method->class);

        var_dump($method->getFileName());
        var_dump($method->getName());
//        var_dump($method->getClosure($person_2));   // ?
        var_dump($method->getDeclaringClass());
        var_dump($method->getDocComment());
        var_dump($method->getEndLine());
        var_dump($method->getExtension());
        var_dump($method->getExtensionName());
        var_dump($method->getModifiers());
        var_dump($method->getNamespaceName());
        var_dump($method->getNumberOfParameters());
        var_dump($method->getNumberOfRequiredParameters());
        var_dump($method->getParameters());
        var_dump($method->getShortName()); // ？
        var_dump($method->getStartLine());
        var_dump($method->getStaticVariables());

        var_dump($method->isPublic());
        var_dump($method->isFinal());
        var_dump($method->isAbstract());
        var_dump($method->isClosure());
        var_dump($method->isPrivate());
        var_dump($method->isProtected());
        var_dump($method->isStatic());
        var_dump($method->isUserDefined());
        var_dump($method->isInternal());
        var_dump($method->isConstructor()); // 是否是构造方法
        var_dump($method->isDeprecated()); // 是否是 不推荐的方法（针对系统内部方法有效）
        var_dump($method->isDestructor()); // 是否是析构方法
        var_dump($method->isGenerator()); // ？
        var_dump($method->isVariadic()); // ？
//        var_dump($method->getPrototype()); // does not have a prototype 会抛出致命错误
//        var_dump($method->getReturnType()); // php 7 才有这个方法

        var_dump($method);





    }
}
