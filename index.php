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

    console.log("{Man.prototype} = ", Man.prototype);
    console.log("{Student.prototype} = ", Student.prototype);

    console.log("{new Man(1, 2)} = ", new Man(1, 2));
    console.log("{new Student(1, 2)} = ", new Student(1, 2));

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

        this.study = function() {
            return this.age--;
        };
    }

    Student2.prototype = Object.create(Man2.prototype);
    Student2.prototype.constructor = Student2;

    console.log("{Man2.prototype} = ", Man2.prototype);
    console.log("{Student2.prototype} = ", Student2.prototype);

    console.log("{new Man2(1, 2)} = ", new Man2(1, 2));
    console.log("{new Student2(1, 2)} = ", new Student2(1, 2));
</script>


<script type="text/javascript">

    //Duck Type

    function duckType(obj) {
        return (obj.hasOwnProperty('study'))?'student':'man';
    }
    console.log("{ duckType( new Man2()) } = ", duckType( new Man2() ) );
    console.log("{ duckType( new Student()) } = ", duckType( new Student() ) );

</script>

<script type="text/javascript">

    function duckType2() {
        return (this.hasOwnProperty('study'))?'student':'man';
    }


    console.log("{duckType2.call( new Man() )} = ", duckType2.call( new Man() ) );
    console.log("{duckType2.call( new Student2() )} = ", duckType2.call( new Student2() ) );

</script>