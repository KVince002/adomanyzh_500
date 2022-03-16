//*itt van a baseurl 
const baseUrl = location.protocol + "//" + location.host + "/adomany_uj";

//url változók megkapása
function getUrlVariable(varName) {
    const splittedUrl = location.href.split("?");
    const urlVars = splittedUrl[1].split("&");
    let varValue = "";

    urlVars.forEach((urlVar) => {
        const splittedVar = urlVar.split("=");

        if (splittedVar[0] === varName)
            varValue = splittedVar[1];
    });

    return varValue;
}

console.log(getUrlVariable("valamimas"));