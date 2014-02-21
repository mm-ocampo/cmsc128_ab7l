    window.onload = function(){
      material_form.accession_number.focus();
      material_form.accession_number.onblur = validate_accession_number;
      material_form.subject.onblur = validate_subject;
      material_form.title.onblur = validate_title;
      material_form.author.onblur = validate_author;
      material_form.publisher.onblur = validate_publisher;
    }

    function validate_accession_number(){
      var prompt = "";
      str = material_form.accession_number.value;
      if(str == "")
        prompt = "This is a required field.";
      else if(!str.match(/^[a-zA-Z][0-9a-zA-Z\-]+$/))
        prompt = "Only Letters, Numbers, and Hypen are allowed in this field.";
      document.getElementsByName('accession_number_prompt')[0].innerHTML = prompt;
      if(prompt == "")
        return true;
    }

    function validate_subject(){
      var prompt = "";
      str = material_form.subject.value;
      if(str == "")
        prompt = "This is a required field.";
      else if(!str.match(/^[a-zA-Z][0-9a-zA-Z]+$/))
        prompt = "Only Letters and Numbers are allowed in this field.";
      document.getElementsByName('subject_prompt')[0].innerHTML = prompt;
      if(prompt == "")
        return true;
    }

    function validate_title(){
      var prompt = "";
      str = material_form.title.value;
      if(str == "")
        prompt = "This is a required field.";
      else if(!str.match(/^[a-zA-Z][0-9a-zA-Z\-\ \.]+$/))
        prompt = "Only Letters, Numbers, Spaces, Period and Hypen are allowed in this field.";
      document.getElementsByName('title_prompt')[0].innerHTML = prompt;
      if(prompt == "")
        return true;
    }

    function validate_author(){
      var prompt = "";
      str = material_form.author.value;
      if(str == "")
        prompt = "This is a required field.";
      else if(!str.match(/^[a-zA-Z][0-9a-zA-Z\-\ \.]+$/))
        prompt = "Only Letters, Numbers, Spaces, Period and Hypen are allowed in this field.";
      document.getElementsByName('author_prompt')[0].innerHTML = prompt;
      if(prompt == "")
        return true;
    }

    function validate_publisher(){
      var prompt = "";
      str = material_form.publisher.value;
      if(str == "")
        prompt = "This is a required field.";
      else if(!str.match(/^[a-zA-Z][0-9a-zA-Z\-\ \.]+$/))
        prompt = "Only Letters, Numbers, Spaces, Period and Hypen are allowed in this field.";
      document.getElementsByName('publisher_prompt')[0].innerHTML = prompt;
      if(prompt == "")
        return true;
    }

    function check_all_fields(){
      if(validate_publisher() && validate_author() && validate_accession_number() && validate_subject() && validate_title()){
        return true;
      }
      else return false;
    }

