

function parentFrameUefModeOriginalUseUefSupportCenterVariable() {
    try {
        return window.parent.var_uefModeOriginalUseUefSupportCenter;
    }
    catch (e) {
        return undefined;
    }
}

/* debug userName = "sessionkey"; */

var var_key = "b81eaee3-d61d-46af-a507-e0309dcc9d76";
var var_dashboard_url = "https://campusvirtual.eesysoft.com";
var var_loadfile = "https://campusvirtual.eesysoft.com/loadFile";
var var_style_path = "https://campusvirtual.eesysoft.com/resources";
var var_stamp = "20231120181504";
var var_eesy_build = "109";
var var_eesy_styles = ["responsive","ultra"];
var var_eesy_dbUpdateCount = "7111";
var var_eesy_userUpdated = undefined;
var var_eesy_style_checksum = "1924204351_";
var var_show_tab_initial = false;
var var_show_tab = var_show_tab_initial;
var var_tab_version = 3;
var var_proactive_version = 4;
var var_proactive_lms = "blackboard";
var var_proactive_dark = false;
var var_open_as_chat = false;
var var_moveable_tab = true;
var var_language = 78;
var var_expert_language = -1;
var var_uefMode = true;
var var_isLtiLaunch = false;
var var_ltiEngineIsPresent = false;
var var_uefModeOriginal = !var_uefMode && (window.name === "classic-learn-iframe");
var var_uefModeOriginalUseUefSupportCenter = true;
var isUefOriginalSupportCenter = !var_uefMode && (var_uefModeOriginalUseUefSupportCenter || parentFrameUefModeOriginalUseUefSupportCenterVariable());
var var_loadExpertTool = false;
var var_isExpertToolChromePlugin = false;
var waitforload = false;
var supportTabMinimized = undefined;
var scrollbarRightAdjust = '19px';
var supportTabMoveLimit = '50';
var eesy_minimizedTabWidth = '8px';
var eesy_maximizedTabWidth = '';
var attemptUnobscure = false;
var doNotLoadEngineForUserAgentPattern = 'not_in_use_05231;';
var var_eesy_hiddenHelpItems = undefined;
var var_eesy_sac = undefined;
var var_eesy_helpitemsSeen = undefined;
var var_user_map = {"isDebug":false,"userUpdatedStamp":"20210706125602","expertLanguageId":-1,"supportTabPosition":null,"reset_views_stamp":"","isShowTab":false,"languageId":78,"isSupportTabMinimized":false,"userWalkProgressUpdatedStamp":"0","id":94677};
var var_instance_name = "campusvirtual";

function eesy_load_js(jsUrl) {
  var fileref = document.createElement("script");
  fileref.setAttribute("type", "text/javascript");
  fileref.setAttribute("src", jsUrl);
  document.getElementsByTagName("head")[0].appendChild(fileref);
}

eesy_load_js(var_dashboard_url + "/v2/dist/loader.js?__bn=" + var_eesy_build);
