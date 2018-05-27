$(document).ready(function() {
  const initials = JSON.parse($('data').attr('initials'));
  const permissionId = '#permission';
  const addButtonId = '#add-button';
  const permissionOptionClass = '.permission-options';
  const choosenListId = '#choosen-list';
  const submitButtonId = '#submit-button';
  const permissionValueId = '#permissions';

  let permissionNameMapping = {};
  let currentPermission;
  let taken;
  let currentChoosenPermission = [];

  const init = () => {
  	taken = _.reduce(initials.permissions, (result, current) => {
  	  result[current.id] = false;

  	  return result;
  	}, {});

  	_.forEach(initials.permissions, (current) => {
  	  permissionNameMapping[current.id] = current.display_name;
  	});
  }

  const getpermissionValue = () => {
  	currentPermission = $(permissionId).val();
    // console.log("currentPermission");
    // console.log(currentPermission);
  }

  const renderAddButton = () => {
  	if(!_.isEmpty(currentPermission)) {
      // console.log('ada isi');
      $(addButtonId).attr('disabled', false);
    } else {
      // console.log('kosong');
  	  $(addButtonId).attr('disabled', true);
  	}
  	updateSubmitButton();
  }

  const addPermission = () => {
  	currentChoosenPermission.push(currentPermission);
  	$(permissionId).val("");
  	getpermissionValue();
  	renderAddButton();
  }
  
  const renderChoosenList = () => {
  	$(choosenListId)
  	  .find('li')
  	  .remove()
  	  .end();

    _.forEach(currentChoosenPermission, (current) => {
  	  $(choosenListId).append($('<li>', {
  	    id : current,
  	    text : permissionNameMapping[current]
  	  }));
    });
    updatePermissionValue();
    updateSubmitButton();
  }

  const updatePermissionValue = () => {
  	$(permissionValueId).val(JSON.stringify(currentChoosenPermission));
    console.log(currentChoosenPermission);
  }

  const updateSubmitButton = () => {
  	if(currentChoosenPermission.length > 0) {
      $(submitButtonId).attr('disabled', false);
    } else {
  	  $(submitButtonId).attr('disabled', true);
  	}
  }

  init();

  $(permissionId).change(() => {
  	getpermissionValue();
  	renderAddButton();
  });

  $(addButtonId).click(() => {
  	addPermission();
  	renderChoosenList();
  	return false;
  });

});