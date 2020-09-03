<?php
class ControllerExtensionModuleExampleEventExtension extends Controller {
	public function install()
	{
		$this->load->model('setting/event');
		$this->model_setting_event->addEvent(
			'example_event_extension_menu',
			'admin/view/common/column_left/before',
			'extension/module/example_event_extension/addMenu'
		);
		$this->model_setting_event->addEvent(
			'example_event_extension_script',
			'admin/view/common/header/before',
			'extension/module/example_event_extension/addScript'
		);
	}

	public function uninstall()
	{
		$this->load->model('setting/event');
		$this->model_setting_event->deleteEventByCode('example_event_extension_menu');
		$this->model_setting_event->deleteEventByCode('example_event_extension_script');
	}

	public function addMenu($eventRoute, &$data)
	{
		$data['menus'][] = [
			'id' => 'some-menu-example',
			'icon' => 'fa fa-shopping-cart fa-fw',
			'name' => 'Example extension',
			'href' => '#test',
			''
		];
	}

	public function addScript($eventRoute, &$data)
	{
		$data['scripts'][] = 'view/javascript/example.js';
	}
}
