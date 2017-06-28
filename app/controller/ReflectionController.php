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

    /*
     * 写在前面的
     * 不使用反射获取对象或者类的信息，可以使用一些系统内置的函数
     */
    public function actionT1()
    {
        $liujie = new Person('liujie', 18, '男');

        // 获取对象类名
        var_dump(get_class($liujie));

        // 返回对象属性的关联数组
        var_dump(get_object_vars($liujie));

        // 类属性
        var_dump(get_class_vars(get_class($liujie)));

        // 返回由类的方法名组成的数组
        var_dump(get_class_methods(get_class($liujie)));
    }

     /*--------------------------------------------------
      *  反射API拥有更加强大的 获取类或对象的信息的能力
      *  先掌握下面这些常用的
      * 1.ReflectionObject
      * 2.ReflectionClass
      * 3.ReflectionMethod
      * 4.ReflectionProperty
      * 5.ReflectionParameter
      *
      * --------------------------------------------------
      */



    // ReflectionObject
    public function actionT2()
    {
        $liujie = new Person('liujie', 18, '男');
        $reflection = new \ReflectionObject($liujie);

        var_dump($reflection->getProperties(\ReflectionProperty::IS_PUBLIC));
        $reflectionProperty = $reflection->getProperty('name');

        var_dump($reflectionProperty);
        var_dump($reflection->isUserDefined());
        var_dump($reflection);
    }

    // ReflectionClass
    public function actionT3(){

        $reflectionClass = new \ReflectionClass('app\lib\reflection\Person');
        $reflectionClassPdo = new \ReflectionClass('\PDO');

        var_dump($reflectionClass->getFileName());
        var_dump($reflectionClass->getNamespaceName());
        var_dump($reflectionClass->getExtensionName()); // 是哪个扩展扩定义的此类， 用户自定义类返回false
        var_dump($reflectionClassPdo->getExtensionName());
        var_dump($reflectionClass->inNamespace());  // true  是否在命名空间中
        var_dump($reflectionClassPdo->inNamespace());   // false
        var_dump($reflectionClass->hasMethod('sayHello'));
        var_dump($reflectionClass);
    }

    // ReflectionProperty
    public function actionT4()
    {
        $reflectionClass = new \ReflectionClass('app\lib\reflection\Person');
//        $reflectionProperty = $reflectionClass->getProperties(\ReflectionProperty::IS_PUBLIC);
        if ($reflectionClass->hasProperty('level')){
            $reflectionProperty = $reflectionClass->getProperty('level');
        }else{
            $reflectionProperty = $reflectionClass->getProperty('name');
        }

        $person = new Person();
        var_dump($reflectionProperty->getModifiers()); // 返回256 意义暂不明   解释 256 表示 public 256是反射类中定义的常量IS_PUBLIC的值
        var_dump($reflectionProperty->name);
        var_dump($reflectionProperty->class);
        var_dump($reflectionProperty->getDeclaringClass());
        var_dump($reflectionProperty->isDefault());
        var_dump($reflectionProperty->getName());
        //var_dump($reflectionProperty->setAccessible(true));  // 没有返回值
        var_dump($reflectionProperty->setValue($person, 'liujie'));
        var_dump($reflectionProperty->getValue($person));
        var_dump($reflectionProperty);
    }

    // ReflectionMethod
    public function actionT5()
    {
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

        $person->sayHello('sdsd');
        echo "<br/>";
        // 或者
        $method->invoke($person, 'sdsdsd');
        var_dump($method);





    }

    // ReflectionParameter
    public function actionT6()
    {
        $reflectionClass = new \ReflectionClass('app\lib\reflection\Person');
        if ($reflectionClass->hasMethod('sayHello')){
            $reflectionMedthod = $reflectionClass->getMethod('sayHello');  // 这里如果sayHello不存在，php会报 Fatal error
        }

        $arr = $reflectionClass->getMethods(\ReflectionMethod::IS_PUBLIC);
        $reflectionParameters = $reflectionMedthod->getParameters();

//        foreach ($reflectionParameters as $reflectionParameter){
//            var_dump($reflectionParameter->name);
//        }
//        var_dump($reflectionParameters);
        $reflectionParameter = $reflectionParameters[0];
        $reflectionParameter_2 = $reflectionParameters[1];


        var_dump($reflectionParameter);
        var_dump($reflectionParameter->allowsNull()); // 不明
        var_dump($reflectionParameter->getDeclaringFunction());
        var_dump($reflectionParameter->canBePassedByValue());
//        var_dump($reflectionParameter->hasType());  // php 7 才有
        var_dump($reflectionParameter->isArray());
        var_dump($reflectionParameter->getPosition());  // 这个有用  返回时第几个参数  左到右 0， 1， 2
//        var_dump($reflectionParameter->getType());  // php 7 才有  返回 ReflectionType
        var_dump($reflectionParameter->isPassedByReference());
        var_dump($reflectionParameter->isOptional());
        if ($reflectionParameter_2->isOptional()){
            var_dump($reflectionParameter_2->getDefaultValue());    // 有用 获取可选参数的默认值
        }

        var_dump($reflectionParameter->isCallable());
//        var_dump($reflectionParameter->isDefaultValueConstant());   // 检测参数默认值是否是一个常量  注意：如果没有默认值会报fatal error

        var_dump($reflectionParameter_2->isDefaultValueAvailable()); // return true
        var_dump($reflectionParameter->isDefaultValueAvailable()); // return false
    }

}
