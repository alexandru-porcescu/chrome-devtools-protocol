<?php
namespace ChromeDevtoolsProtocol\Model\Tracing;

/**
 * Configuration for memory dump. Used only when "memory-infra" category is enabled.
 *
 * @generated This file has been auto-generated, do not edit.
 *
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 */
final class MemoryDumpConfig implements \JsonSerializable
{
	public static function fromJson($data)
	{
		$instance = new static();
		return $instance;
	}


	public function jsonSerialize()
	{
		$data = new \stdClass();
		return $data;
	}
}