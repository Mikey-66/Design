<!DOCTYPE html>
    <body>
        <p>XSS TEST</p>
        <form name="test" id="test" method="post" action="index.php?r=safe/addarticle">
            <textarea name="content" cols="40" rows="6"></textarea>
            <br/>
            <button>submit</button>
        </form>
    </body>
</html>
