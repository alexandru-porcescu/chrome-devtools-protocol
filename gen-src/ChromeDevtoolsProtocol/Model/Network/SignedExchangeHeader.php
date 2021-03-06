<?php
namespace ChromeDevtoolsProtocol\Model\Network;

/**
 * Information about a signed exchange header. https://wicg.github.io/webpackage/draft-yasskin-httpbis-origin-signed-exchanges-impl.html#cbor-representation
 *
 * @generated This file has been auto-generated, do not edit.
 *
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 */
final class SignedExchangeHeader implements \JsonSerializable
{
	/**
	 * Signed exchange request URL.
	 *
	 * @var string
	 */
	public $requestUrl;

	/**
	 * Signed exchange request method.
	 *
	 * @var string
	 */
	public $requestMethod;

	/**
	 * Signed exchange response code.
	 *
	 * @var int
	 */
	public $responseCode;

	/**
	 * Signed exchange response headers.
	 *
	 * @var Headers
	 */
	public $responseHeaders;

	/**
	 * Signed exchange response signature.
	 *
	 * @var SignedExchangeSignature[]
	 */
	public $signatures;


	public static function fromJson($data)
	{
		$instance = new static();
		if (isset($data->requestUrl)) {
			$instance->requestUrl = (string)$data->requestUrl;
		}
		if (isset($data->requestMethod)) {
			$instance->requestMethod = (string)$data->requestMethod;
		}
		if (isset($data->responseCode)) {
			$instance->responseCode = (int)$data->responseCode;
		}
		if (isset($data->responseHeaders)) {
			$instance->responseHeaders = Headers::fromJson($data->responseHeaders);
		}
		if (isset($data->signatures)) {
			$instance->signatures = [];
			foreach ($data->signatures as $item) {
				$instance->signatures[] = SignedExchangeSignature::fromJson($item);
			}
		}
		return $instance;
	}


	public function jsonSerialize()
	{
		$data = new \stdClass();
		if ($this->requestUrl !== null) {
			$data->requestUrl = $this->requestUrl;
		}
		if ($this->requestMethod !== null) {
			$data->requestMethod = $this->requestMethod;
		}
		if ($this->responseCode !== null) {
			$data->responseCode = $this->responseCode;
		}
		if ($this->responseHeaders !== null) {
			$data->responseHeaders = $this->responseHeaders->jsonSerialize();
		}
		if ($this->signatures !== null) {
			$data->signatures = [];
			foreach ($this->signatures as $item) {
				$data->signatures[] = $item->jsonSerialize();
			}
		}
		return $data;
	}
}
