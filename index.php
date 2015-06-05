<script type="text/javascript">

    //Here is prototype inheritance

    //Man
    function Man(age, name) {
        this.age = age;
        this.name = name;
    }


    Man.prototype.live = function() {
        return this.age > 0;
    };

    //Student
    function Student(age, name) {
        Student.superclass.apply(this, arguments);
        this.study = function() {
            return this.age--;
        };
    }

    Student.superclass = Man;
    Student.prototype.constructor = Student;

    Student.prototype.assign = Man.prototype;


</script>

<script type="text/javascript">

    //Here is Object.create inheritance

    //Man
    function Man2(age, name) {
        this.age = age;
        this.name = name;
    }

    Man2.prototype.live = function() {
        return this.age > 0;
    };

    //Student
    function Student2(age, name) {
        Man2.call(this, age, name);
    }

    Student2.prototype = Object.create(Man2.prototype);
    Student2.prototype.constructor = Student2;

    Student2.prototype.study = function() {
        return this.age--;
    };

</script>


<script type="text/javascript">

    //Duck Type

    function duckType(obj) {
        return (typeof obj.study !== 'undefined')?'student':'man';
    }

</script>