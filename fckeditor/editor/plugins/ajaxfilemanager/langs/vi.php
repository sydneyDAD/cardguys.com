<?php
	/**
	 * language pack
	 * @author Logan Cai (cailongqun [at] yahoo [dot] com [dot] cn)
	 * @link www.phpletter.com
	 * @since 22/April/2007
	 *
	 */
	define('DATE_TIME_FORMAT', 'd/M/Y H:i:s');
	//Common
	//Menu
	
	
	
	
	define('MENU_SELECT', 'Chọn');
	define('MENU_DOWNLOAD', 'Tải xuống');
	define('MENU_PREVIEW', 'Xem trước');
	define('MENU_RENAME', 'Đổi tên');
	define('MENU_EDIT', 'Sửa ảnh');
	define('MENU_CUT', 'Cut');
	define('MENU_COPY', 'Copy');
	define('MENU_DELETE', 'Xóa');
	define('MENU_PLAY', 'Play');
	define('MENU_PASTE', 'Paste');
	
	//Label
		//Top Action
		define('LBL_ACTION_REFRESH', 'Refresh');
		define('LBL_ACTION_DELETE', 'Xóa');
		define('LBL_ACTION_CUT', 'Cut');
		define('LBL_ACTION_COPY', 'Copy');
		define('LBL_ACTION_PASTE', 'Paste');
		define('LBL_ACTION_CLOSE', 'Đóng');
		define('LBL_ACTION_SELECT_ALL', 'Chọn tất cả');
		//File Listing
	define('LBL_NAME', 'Tên');
	define('LBL_SIZE', 'Kích thước');
	define('LBL_MODIFIED', 'Được thay đổi lúc');
		//File Information
	define('LBL_FILE_INFO', 'Thông tin file:');
	define('LBL_FILE_NAME', 'Tên:');	
	define('LBL_FILE_CREATED', 'Ngày tạo:');
	define('LBL_FILE_MODIFIED', 'Ngày đổi:');
	define('LBL_FILE_SIZE', 'Kích thước:');
	define('LBL_FILE_TYPE', 'Loại:');
	define('LBL_FILE_WRITABLE', 'Ghi?');
	define('LBL_FILE_READABLE', 'Đọc?');
		//Folder Information
	define('LBL_FOLDER_INFO', 'Thông tin Folder');
	define('LBL_FOLDER_PATH', 'Folder:');
	define('LBL_CURRENT_FOLDER_PATH', 'Đường dẫn folder:');
	define('LBL_FOLDER_CREATED', 'Ngày tạo:');
	define('LBL_FOLDER_MODIFIED', 'Ngày tạo:');
	define('LBL_FOLDER_SUDDIR', 'Folder con:');
	define('LBL_FOLDER_FIELS', 'Files:');
	define('LBL_FOLDER_WRITABLE', 'Ghi?');
	define('LBL_FOLDER_READABLE', 'Đọc?');
	define('LBL_FOLDER_ROOT', 'Folder gốc');
		//Preview
	define('LBL_PREVIEW', 'Preview');
	define('LBL_CLICK_PREVIEW', 'Ấn vào đây để xem ảnh.');
	//Buttons
	define('LBL_BTN_SELECT', 'Chọn');
	define('LBL_BTN_CANCEL', 'Cancel');
	define('LBL_BTN_UPLOAD', 'Upload');
	define('LBL_BTN_CREATE', 'Tạo');
	define('LBL_BTN_CLOSE', 'Đóng');
	define('LBL_BTN_NEW_FOLDER', 'Tạo folder mới');
	define('LBL_BTN_NEW_FILE', 'New File');
	define('LBL_BTN_EDIT_IMAGE', 'Thay đổi');
	define('LBL_BTN_VIEW', 'Chọn');
	define('LBL_BTN_VIEW_TEXT', 'Text');
	define('LBL_BTN_VIEW_DETAILS', 'Xem dạng liệt kê');
	define('LBL_BTN_VIEW_THUMBNAIL', 'Xem dạng ảnh mô tả');
	define('LBL_BTN_VIEW_OPTIONS', 'Xem bằng cách:');
	//pagination
	define('PAGINATION_NEXT', 'Tiếp theo');
	define('PAGINATION_PREVIOUS', 'Trước');
	define('PAGINATION_LAST', 'Cuối');
	define('PAGINATION_FIRST', 'Đầu tiên');
	define('PAGINATION_ITEMS_PER_PAGE', 'Hiển thị %s file trong 1 trang');
	define('PAGINATION_GO_PARENT', 'Đến folder hiện tại');
	//System
	define('SYS_DISABLED', 'Bạn không đủ quyền hạn để truy cập.');
	
	//Cut
	define('ERR_NOT_DOC_SELECTED_FOR_CUT', 'Không tài liệu nào được chọn để cut.');
	//Copy
	define('ERR_NOT_DOC_SELECTED_FOR_COPY', 'Không tài liệu nào được chọn để copy.');
	//Paste
	define('ERR_NOT_DOC_SELECTED_FOR_PASTE', 'Không tài liệu nào được chọn để paste.');
	define('WARNING_CUT_PASTE', 'Ban chắc là sẽ di chuyển folder hiện tại chứ?');
	define('WARNING_COPY_PASTE', 'Bạn chắc sẽ copy tài liệu được chọn vào folder này chứ?');
	define('ERR_NOT_DEST_FOLDER_SPECIFIED', 'No destination folder specified.');
	define('ERR_DEST_FOLDER_NOT_FOUND', 'Destination folder not found.');
	define('ERR_DEST_FOLDER_NOT_ALLOWED', 'Không chấp nhận việc di chuyển file vào folder này');
	define('ERR_UNABLE_TO_MOVE_TO_SAME_DEST', 'Failed to move this file (%s): Original path is same as destination path.');
	define('ERR_UNABLE_TO_MOVE_NOT_FOUND', 'Failed to move this file (%s): Original file does not exist.');
	define('ERR_UNABLE_TO_MOVE_NOT_ALLOWED', 'Failed to move this file (%s): Original file access denied.');
 
	define('ERR_NOT_FILES_PASTED', 'No file(s) has been pasted.');

	//Search
	define('LBL_SEARCH', 'Tìm kiếm');
	define('LBL_SEARCH_NAME', 'Tên file:');
	define('LBL_SEARCH_FOLDER', 'Tìm trong:');
	define('LBL_SEARCH_QUICK', 'Tìm kiếm nhanh');
	define('LBL_SEARCH_MTIME', 'Thời gian thay đổi:');
	define('LBL_SEARCH_SIZE', 'Kích thước:');
	define('LBL_SEARCH_ADV_OPTIONS', 'Lựa chọn nâng cao');
	define('LBL_SEARCH_FILE_TYPES', 'Loại file:');
	define('SEARCH_TYPE_EXE', 'Application');
	
	define('SEARCH_TYPE_IMG', 'Ảnh');
	define('SEARCH_TYPE_ARCHIVE', 'Archive');
	define('SEARCH_TYPE_HTML', 'HTML');
	define('SEARCH_TYPE_VIDEO', 'Video');
	define('SEARCH_TYPE_MOVIE', 'Movie');
	define('SEARCH_TYPE_MUSIC', 'Music');
	define('SEARCH_TYPE_FLASH', 'Flash');
	define('SEARCH_TYPE_PPT', 'PowerPoint');
	define('SEARCH_TYPE_DOC', 'Document');
	define('SEARCH_TYPE_WORD', 'Word');
	define('SEARCH_TYPE_PDF', 'PDF');
	define('SEARCH_TYPE_EXCEL', 'Excel');
	define('SEARCH_TYPE_TEXT', 'Text');
	define('SEARCH_TYPE_UNKNOWN', 'Unknown');
	define('SEARCH_TYPE_XML', 'XML');
	define('SEARCH_ALL_FILE_TYPES', 'Tất cả các loại file');
	define('LBL_SEARCH_RECURSIVELY', 'Search Recursively:');
	define('LBL_RECURSIVELY_YES', 'Yes');
	define('LBL_RECURSIVELY_NO', 'No');
	define('BTN_SEARCH', 'Tìm kiếm');
	//thickbox
	define('THICKBOX_NEXT', 'Tiếp&gt;');
	define('THICKBOX_PREVIOUS', '&lt;Trước');
	define('THICKBOX_CLOSE', 'Đóng');
	//Calendar
	define('CALENDAR_CLOSE', 'Đóng');
	define('CALENDAR_CLEAR', 'Clear');
	define('CALENDAR_PREVIOUS', '&lt;Prev');
	define('CALENDAR_NEXT', 'Next&gt;');
	define('CALENDAR_CURRENT', 'Today');
	define('CALENDAR_MON', 'Th2');
	define('CALENDAR_TUE', 'Th3');
	define('CALENDAR_WED', 'Th4');
	define('CALENDAR_THU', 'Th5');
	define('CALENDAR_FRI', 'Th6');
	define('CALENDAR_SAT', 'Th7');
	define('CALENDAR_SUN', 'CN');
	define('CALENDAR_JAN', 'Thg1');
	define('CALENDAR_FEB', 'Thg2');
	define('CALENDAR_MAR', 'Thg3');
	define('CALENDAR_APR', 'Thg4');
	define('CALENDAR_MAY', 'Thg5');
	define('CALENDAR_JUN', 'Thg6');
	define('CALENDAR_JUL', 'Thg7');
	define('CALENDAR_AUG', 'Thg8');
	define('CALENDAR_SEP', 'Thg9');
	define('CALENDAR_OCT', 'Thg10');
	define('CALENDAR_NOV', 'Thg11');
	define('CALENDAR_DEC', 'Thg12');
	//ERROR MESSAGES
		//deletion
	define('ERR_NOT_FILE_SELECTED', 'Hãy chọn 1 file.');
	define('ERR_NOT_DOC_SELECTED', 'No document(s) selected for deletion.');
	define('ERR_DELTED_FAILED', 'Không thể xóa tài liệu này được.');
	define('ERR_FOLDER_PATH_NOT_ALLOWED', 'Đường dẫn này không được chấp nhận.');
		//class manager
	define('ERR_FOLDER_NOT_FOUND', 'Unable to locate the specific folder: ');
		//rename
	define('ERR_RENAME_FORMAT', 'Please give it a name which only contain letters, digits, space, hyphen and underscore.');
	define('ERR_RENAME_EXISTS', 'Please give it a name which is unique under the folder.');
	define('ERR_RENAME_FILE_NOT_EXISTS', 'The file/folder does not exist.');
	define('ERR_RENAME_FAILED', 'Unable to rename it, please try again.');
	define('ERR_RENAME_EMPTY', 'Please give it a name.');
	define('ERR_NO_CHANGES_MADE', 'No changes has been made.');
	define('ERR_RENAME_FILE_TYPE_NOT_PERMITED', 'You are not permitted to change the file to such extension.');
		//folder creation
	define('ERR_FOLDER_FORMAT', 'Please give it a name which only contain letters, digits, space, hyphen and underscore.');
	define('ERR_FOLDER_EXISTS', 'Please give it a name which is unique under the folder.');
	define('ERR_FOLDER_CREATION_FAILED', 'Unable to create a folder, please try again.');
	define('ERR_FOLDER_NAME_EMPTY', 'Please give it  a name.');
	define('FOLDER_FORM_TITLE', 'New Folder Form');
	define('FOLDER_LBL_TITLE', 'Tên Folder:');
	define('FOLDER_LBL_CREATE', 'Tạo Folder');
	//New File
	define('NEW_FILE_FORM_TITLE', 'Thêm form tạo file');
	define('NEW_FILE_LBL_TITLE', 'Tên file:');
	define('NEW_FILE_CREATE', 'Tạo file');
		//file upload
	define('ERR_FILE_NAME_FORMAT', 'Please give it a name which only contain letters, digits, space, hyphen and underscore.');
	define('ERR_FILE_NOT_UPLOADED', 'Chưa chọn file để upload');
	define('ERR_FILE_TYPE_NOT_ALLOWED', 'Loại file này bạn không có quyền upload');
	define('ERR_FILE_MOVE_FAILED', 'Lỗi di chuyển file.');
	define('ERR_FILE_NOT_AVAILABLE', 'The file is unavailable.');
	define('ERROR_FILE_TOO_BID', 'File có dung lượng quá lớn. (tối đa: %s)');
	define('FILE_FORM_TITLE', 'Form upload (ấn vào dấu + để thêm form)');
	define('FILE_LABEL_SELECT', 'Chọn file');
	define('FILE_LBL_MORE', 'Thêm form để upload');
	define('FILE_CANCEL_UPLOAD', 'Hủy file upload');
	define('FILE_LBL_UPLOAD', 'Upload');
	//file download
	define('ERR_DOWNLOAD_FILE_NOT_FOUND', 'Chưa file nào được chọn để download.');
	//Rename
	define('RENAME_FORM_TITLE', 'Rename Form');
	define('RENAME_NEW_NAME', 'Tạo file mới');
	define('RENAME_LBL_RENAME', 'Đổi tên');

	//Tips
	define('TIP_FOLDER_GO_DOWN', 'Single Click to get to this folder...');
	define('TIP_DOC_RENAME', 'Click đúp để đổi tên...');
	define('TIP_FOLDER_GO_UP', 'Single Click to get to the parent folder...');
	define('TIP_SELECT_ALL', 'Chọn tất cả');
	define('TIP_UNSELECT_ALL', 'Bỏ chọn tất cả');
	//WARNING
	define('WARNING_DELETE', 'Bạn chắc là muốn xóa tài liệu này chứ.');
	define('WARNING_IMAGE_EDIT', 'Chọn 1 ảnh để thay đổi.');
	define('WARNING_NOT_FILE_EDIT', 'Chọn 1 file để thay đổi.');
	define('WARING_WINDOW_CLOSE', 'Bạn chắc là muốn đóng window chứ?');
	//Preview
	define('PREVIEW_NOT_PREVIEW', 'No preview available.');
	define('PREVIEW_OPEN_FAILED', 'Unable to open the file.');
	define('PREVIEW_IMAGE_LOAD_FAILED', 'Unable to load the image');

	//Login
	define('LOGIN_PAGE_TITLE', 'Ajax File Manager Login Form');
	define('LOGIN_FORM_TITLE', 'Login Form');
	define('LOGIN_USERNAME', 'Username:');
	define('LOGIN_PASSWORD', 'Password:');
	define('LOGIN_FAILED', 'Invalid username/password.');
	
	
	//88888888888   Below for Image Editor   888888888888888888888
		//Warning 
		define('IMG_WARNING_NO_CHANGE_BEFORE_SAVE', 'You have not made any changes to the images.');
		
		//General
		define('IMG_GEN_IMG_NOT_EXISTS', 'Ảnh không tồn tại');
		define('IMG_WARNING_LOST_CHANAGES', 'All unsaved changes made to the image will lost, are you sure you wish to continue?');
		define('IMG_WARNING_REST', 'All unsaved changes made to the image will be lost, are you sure to reset?');
		define('IMG_WARNING_EMPTY_RESET', 'No changes has been made to the image so far');
		define('IMG_WARING_WIN_CLOSE', 'Bạn chắc sẽ đóng lại chứ?');
		define('IMG_WARNING_UNDO', 'Bạn có muốn phục hồi lại ảnh trước đó ?');
		define('IMG_WARING_FLIP_H', 'Are you sure to flip the image horizotally?');
		define('IMG_WARING_FLIP_V', 'Are you sure to flip the image vertically');
		define('IMG_INFO', 'Thông tin ảnh');
		
		//Mode
			define('IMG_MODE_RESIZE', 'Đổi kích cỡ:');
			define('IMG_MODE_CROP', 'Cắt ảnh:');
			define('IMG_MODE_ROTATE', 'Quay ảnh:');
			define('IMG_MODE_FLIP', 'Flip:');		
		//Button
		
			define('IMG_BTN_ROTATE_LEFT', '90&deg;CCW');
			define('IMG_BTN_ROTATE_RIGHT', '90&deg;CW');
			define('IMG_BTN_FLIP_H', 'Flip Horizontal');
			define('IMG_BTN_FLIP_V', 'Flip Vertical');
			define('IMG_BTN_RESET', 'Reset');
			define('IMG_BTN_UNDO', 'Undo');
			define('IMG_BTN_SAVE', 'Lưu');
			define('IMG_BTN_CLOSE', 'Đóng');
			define('IMG_BTN_SAVE_AS', 'Save As');
			define('IMG_BTN_CANCEL', 'Cancel');
		//Checkbox
			define('IMG_CHECKBOX_CONSTRAINT', 'Constraint?');
		//Label
			define('IMG_LBL_WIDTH', 'Dài:');
			define('IMG_LBL_HEIGHT', 'cao:');
			define('IMG_LBL_X', 'X:');
			define('IMG_LBL_Y', 'Y:');
			define('IMG_LBL_RATIO', 'Ratio:');
			define('IMG_LBL_ANGLE', 'Angle:');
			define('IMG_LBL_NEW_NAME', 'New Name:');
			define('IMG_LBL_SAVE_AS', 'Save As Form');
			define('IMG_LBL_SAVE_TO', 'Lưu vào:');
			define('IMG_LBL_ROOT_FOLDER', 'Folder gốc');
		//Editor
		//Save as 
		define('IMG_NEW_NAME_COMMENTS', 'Please do not contain the image extension.');
		define('IMG_SAVE_AS_ERR_NAME_INVALID', 'Please give it a name which only contain letters, digits, space, hyphen and underscore.');
		define('IMG_SAVE_AS_NOT_FOLDER_SELECTED', 'No distination folder selected.');	
		define('IMG_SAVE_AS_FOLDER_NOT_FOUND', 'The destination folder doest not exist.');
		define('IMG_SAVE_AS_NEW_IMAGE_EXISTS', 'Tồn tại 1 ảnh có tên giống như vậy.');

		//Save
		define('IMG_SAVE_EMPTY_PATH', 'Empty image path.');
		define('IMG_SAVE_NOT_EXISTS', 'Ảnh không tồn tại.');
		define('IMG_SAVE_PATH_DISALLOWED', 'You are not allowed to access this file.');
		define('IMG_SAVE_UNKNOWN_MODE', 'Unexpected Image Operation Mode');
		define('IMG_SAVE_RESIZE_FAILED', 'Failed to resize the image.');
		define('IMG_SAVE_CROP_FAILED', 'Failed to crop the image.');
		define('IMG_SAVE_FAILED', 'Failed to save the image.');
		define('IMG_SAVE_BACKUP_FAILED', 'Unable to backup the original image.');
		define('IMG_SAVE_ROTATE_FAILED', 'Unable to rotate the image.');
		define('IMG_SAVE_FLIP_FAILED', 'Unable to flip the image.');
		define('IMG_SAVE_SESSION_IMG_OPEN_FAILED', 'Unable to open image from session.');
		define('IMG_SAVE_IMG_OPEN_FAILED', 'Unable to open image');
		
		
		//UNDO
		define('IMG_UNDO_NO_HISTORY_AVAIALBE', 'No history avaiable for undo.');
		define('IMG_UNDO_COPY_FAILED', 'Unable to restore the image.');
		define('IMG_UNDO_DEL_FAILED', 'Unable to delete the session image');
	
	//88888888888   Above for Image Editor   888888888888888888888
	
	//88888888888   Session   888888888888888888888
		define('SESSION_PERSONAL_DIR_NOT_FOUND', 'Unable to find the dedicated folder which should have been created under session folder');
		define('SESSION_COUNTER_FILE_CREATE_FAILED', 'Unable to open the session counter file.');
		define('SESSION_COUNTER_FILE_WRITE_FAILED', 'Unable to write the session counter file.');
	//88888888888   Session   888888888888888888888
	
	//88888888888   Below for Text Editor   888888888888888888888
		define('TXT_FILE_NOT_FOUND', 'Không tìm thấy file nào.');
		define('TXT_EXT_NOT_SELECTED', 'Please select file extension');
		define('TXT_DEST_FOLDER_NOT_SELECTED', 'Please select destination folder');
		define('TXT_UNKNOWN_REQUEST', 'Unknown Request.');
		define('TXT_DISALLOWED_EXT', 'You are allowed to edit/add such file type.');
		define('TXT_FILE_EXIST', 'Such file already exits.');
		define('TXT_FILE_NOT_EXIST', 'No such found.');
		define('TXT_CREATE_FAILED', 'Lỗi: không tạo được file mới.');
		define('TXT_CONTENT_WRITE_FAILED', 'Failed to write content to the file.');
		define('TXT_FILE_OPEN_FAILED', 'Lỗi: không mở được file.');
		define('TXT_CONTENT_UPDATE_FAILED', 'Failed to update content to the file.');
		define('TXT_SAVE_AS_ERR_NAME_INVALID', 'Please give it a name which only contain letters, digits, space, hyphen and underscore.');
	//88888888888   Above for Text Editor   888888888888888888888
	
	
?>