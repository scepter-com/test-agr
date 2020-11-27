function isEmpty(param)
{
    if(param === '')
    {
        return true
    }
    else
    {
        return false
    }
}

function createUser()
{
    let username = $("#usernameInput").val()
    let displayName = $("#displayNameInput").val()
    let description = $("#descriptionInput").val()
    let ajaxAllow = false

    if(isEmpty(username) || isEmpty(displayName) || isEmpty(description))
    {
        ajaxAllow = false
        alert("Вы не заполнили все необходимые поля")
    }
    else
    {
        ajaxAllow = true
    }

    if(ajaxAllow)
    {
        $.ajax({
            url: "create.php",
            method: "post",
            dataType: "html",
            data: {
                username:username,
                displayName:displayName,
                description:description
            },
            success: function (data)
            {
                $("#status").html(data)
            },

        })
    }

}