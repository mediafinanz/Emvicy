<?php
/**
 * Status.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

class Status
{
	const CODE_CONTINUE = 100;
	const CODE_SWITCHING_PROTOCOLS = 101;
	const CODE_PROCESSING = 102;
	const CODE_EARLY_HINTS = 103;
	const CODE_UPLOAD_RESUMPTION_SUPPORTED_TEMPORARY___REGISTERED_2024_11_13 = 104;
	const CODE_OK = 200;
	const CODE_CREATED = 201;
	const CODE_ACCEPTED = 202;
	const CODE_NON_AUTHORITATIVE_INFORMATION = 203;
	const CODE_NO_CONTENT = 204;
	const CODE_RESET_CONTENT = 205;
	const CODE_PARTIAL_CONTENT = 206;
	const CODE_MULTI_STATUS = 207;
	const CODE_ALREADY_REPORTED = 208;
	const CODE_IM_USED = 226;
	const CODE_MULTIPLE_CHOICES = 300;
	const CODE_MOVED_PERMANENTLY = 301;
	const CODE_FOUND = 302;
	const CODE_SEE_OTHER = 303;
	const CODE_NOT_MODIFIED = 304;
	const CODE_USE_PROXY = 305;
	const CODE_UNUSED_306 = 306;
	const CODE_TEMPORARY_REDIRECT = 307;
	const CODE_PERMANENT_REDIRECT = 308;
	const CODE_BAD_REQUEST = 400;
	const CODE_UNAUTHORIZED = 401;
	const CODE_PAYMENT_REQUIRED = 402;
	const CODE_FORBIDDEN = 403;
	const CODE_NOT_FOUND = 404;
	const CODE_METHOD_NOT_ALLOWED = 405;
	const CODE_NOT_ACCEPTABLE = 406;
	const CODE_PROXY_AUTHENTICATION_REQUIRED = 407;
	const CODE_REQUEST_TIMEOUT = 408;
	const CODE_CONFLICT = 409;
	const CODE_GONE = 410;
	const CODE_LENGTH_REQUIRED = 411;
	const CODE_PRECONDITION_FAILED = 412;
	const CODE_CONTENT_TOO_LARGE = 413;
	const CODE_URI_TOO_LONG = 414;
	const CODE_UNSUPPORTED_MEDIA_TYPE = 415;
	const CODE_RANGE_NOT_SATISFIABLE = 416;
	const CODE_EXPECTATION_FAILED = 417;
	const CODE_UNUSED_418 = 418;
	const CODE_MISDIRECTED_REQUEST = 421;
	const CODE_UNPROCESSABLE_CONTENT = 422;
	const CODE_LOCKED = 423;
	const CODE_FAILED_DEPENDENCY = 424;
	const CODE_TOO_EARLY = 425;
	const CODE_UPGRADE_REQUIRED = 426;
	const CODE_PRECONDITION_REQUIRED = 428;
	const CODE_TOO_MANY_REQUESTS = 429;
	const CODE_REQUEST_HEADER_FIELDS_TOO_LARGE = 431;
	const CODE_UNAVAILABLE_FOR_LEGAL_REASONS = 451;
	const CODE_INTERNAL_SERVER_ERROR = 500;
	const CODE_NOT_IMPLEMENTED = 501;
	const CODE_BAD_GATEWAY = 502;
	const CODE_SERVICE_UNAVAILABLE = 503;
	const CODE_GATEWAY_TIMEOUT = 504;
	const CODE_HTTP_VERSION_NOT_SUPPORTED = 505;
	const CODE_VARIANT_ALSO_NEGOTIATES = 506;
	const CODE_INSUFFICIENT_STORAGE = 507;
	const CODE_LOOP_DETECTED = 508;
	const CODE_NOT_EXTENDED_OBSOLETED = 510;
	const CODE_NETWORK_AUTHENTICATION_REQUIRED = 511;

	/**
     * @var string[] 
     */
	public static $aCode = array(
		100 => 'Continue',
		101 => 'Switching Protocols',
		102 => 'Processing',
		103 => 'Early Hints',
		104 => 'Upload Resumption Supported TEMPORARY - registered 2024-11-13',
		200 => 'OK',
		201 => 'Created',
		202 => 'Accepted',
		203 => 'Non-Authoritative Information',
		204 => 'No Content',
		205 => 'Reset Content',
		206 => 'Partial Content',
		207 => 'Multi-Status',
		208 => 'Already Reported',
		226 => 'IM Used',
		300 => 'Multiple Choices',
		301 => 'Moved Permanently',
		302 => 'Found',
		303 => 'See Other',
		304 => 'Not Modified',
		305 => 'Use Proxy',
		306 => 'Unused',
		307 => 'Temporary Redirect',
		308 => 'Permanent Redirect',
		400 => 'Bad Request',
		401 => 'Unauthorized',
		402 => 'Payment Required',
		403 => 'Forbidden',
		404 => 'Not Found',
		405 => 'Method Not Allowed',
		406 => 'Not Acceptable',
		407 => 'Proxy Authentication Required',
		408 => 'Request Timeout',
		409 => 'Conflict',
		410 => 'Gone',
		411 => 'Length Required',
		412 => 'Precondition Failed',
		413 => 'Content Too Large',
		414 => 'URI Too Long',
		415 => 'Unsupported Media Type',
		416 => 'Range Not Satisfiable',
		417 => 'Expectation Failed',
		418 => 'Unused',
		421 => 'Misdirected Request',
		422 => 'Unprocessable Content',
		423 => 'Locked',
		424 => 'Failed Dependency',
		425 => 'Too Early',
		426 => 'Upgrade Required',
		428 => 'Precondition Required',
		429 => 'Too Many Requests',
		431 => 'Request Header Fields Too Large',
		451 => 'Unavailable For Legal Reasons',
		500 => 'Internal Server Error',
		501 => 'Not Implemented',
		502 => 'Bad Gateway',
		503 => 'Service Unavailable',
		504 => 'Gateway Timeout',
		505 => 'HTTP Version Not Supported',
		506 => 'Variant Also Negotiates',
		507 => 'Insufficient Storage',
		508 => 'Loop Detected',
		510 => 'Not Extended OBSOLETED',
		511 => 'Network Authentication Required',
	);

	public static function header_Continue()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_CONTINUE . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_CONTINUE
		);
	}

	public static function header_Switching_Protocols()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_SWITCHING_PROTOCOLS . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_SWITCHING_PROTOCOLS
		);
	}

	public static function header_Processing()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_PROCESSING . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_PROCESSING
		);
	}

	public static function header_Early_Hints()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_EARLY_HINTS . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_EARLY_HINTS
		);
	}

	public static function header_Upload_Resumption_Supported_TEMPORARY___registered_2024_11_13()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_UPLOAD_RESUMPTION_SUPPORTED_TEMPORARY___REGISTERED_2024_11_13 . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_UPLOAD_RESUMPTION_SUPPORTED_TEMPORARY___REGISTERED_2024_11_13
		);
	}

	public static function header_OK()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_OK . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_OK
		);
	}

	public static function header_Created()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_CREATED . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_CREATED
		);
	}

	public static function header_Accepted()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_ACCEPTED . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_ACCEPTED
		);
	}

	public static function header_Non_Authoritative_Information()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_NON_AUTHORITATIVE_INFORMATION . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_NON_AUTHORITATIVE_INFORMATION
		);
	}

	public static function header_No_Content()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_NO_CONTENT . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_NO_CONTENT
		);
	}

	public static function header_Reset_Content()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_RESET_CONTENT . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_RESET_CONTENT
		);
	}

	public static function header_Partial_Content()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_PARTIAL_CONTENT . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_PARTIAL_CONTENT
		);
	}

	public static function header_Multi_Status()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_MULTI_STATUS . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_MULTI_STATUS
		);
	}

	public static function header_Already_Reported()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_ALREADY_REPORTED . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_ALREADY_REPORTED
		);
	}

	public static function header_IM_Used()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_IM_USED . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_IM_USED
		);
	}

	public static function header_Multiple_Choices()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_MULTIPLE_CHOICES . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_MULTIPLE_CHOICES
		);
	}

	public static function header_Moved_Permanently()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_MOVED_PERMANENTLY . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_MOVED_PERMANENTLY
		);
	}

	public static function header_Found()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_FOUND . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_FOUND
		);
	}

	public static function header_See_Other()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_SEE_OTHER . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_SEE_OTHER
		);
	}

	public static function header_Not_Modified()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_NOT_MODIFIED . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_NOT_MODIFIED
		);
	}

	public static function header_Use_Proxy()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_USE_PROXY . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_USE_PROXY
		);
	}

	public static function header_Unused_306()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_UNUSED_306 . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_UNUSED_306
		);
	}

	public static function header_Temporary_Redirect()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_TEMPORARY_REDIRECT . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_TEMPORARY_REDIRECT
		);
	}

	public static function header_Permanent_Redirect()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_PERMANENT_REDIRECT . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_PERMANENT_REDIRECT
		);
	}

	public static function header_Bad_Request()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_BAD_REQUEST . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_BAD_REQUEST
		);
	}

	public static function header_Unauthorized()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_UNAUTHORIZED . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_UNAUTHORIZED
		);
	}

	public static function header_Payment_Required()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_PAYMENT_REQUIRED . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_PAYMENT_REQUIRED
		);
	}

	public static function header_Forbidden()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_FORBIDDEN . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_FORBIDDEN
		);
	}

	public static function header_Not_Found()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_NOT_FOUND . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_NOT_FOUND
		);
	}

	public static function header_Method_Not_Allowed()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_METHOD_NOT_ALLOWED . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_METHOD_NOT_ALLOWED
		);
	}

	public static function header_Not_Acceptable()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_NOT_ACCEPTABLE . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_NOT_ACCEPTABLE
		);
	}

	public static function header_Proxy_Authentication_Required()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_PROXY_AUTHENTICATION_REQUIRED . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_PROXY_AUTHENTICATION_REQUIRED
		);
	}

	public static function header_Request_Timeout()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_REQUEST_TIMEOUT . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_REQUEST_TIMEOUT
		);
	}

	public static function header_Conflict()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_CONFLICT . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_CONFLICT
		);
	}

	public static function header_Gone()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_GONE . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_GONE
		);
	}

	public static function header_Length_Required()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_LENGTH_REQUIRED . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_LENGTH_REQUIRED
		);
	}

	public static function header_Precondition_Failed()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_PRECONDITION_FAILED . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_PRECONDITION_FAILED
		);
	}

	public static function header_Content_Too_Large()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_CONTENT_TOO_LARGE . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_CONTENT_TOO_LARGE
		);
	}

	public static function header_URI_Too_Long()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_URI_TOO_LONG . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_URI_TOO_LONG
		);
	}

	public static function header_Unsupported_Media_Type()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_UNSUPPORTED_MEDIA_TYPE . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_UNSUPPORTED_MEDIA_TYPE
		);
	}

	public static function header_Range_Not_Satisfiable()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_RANGE_NOT_SATISFIABLE . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_RANGE_NOT_SATISFIABLE
		);
	}

	public static function header_Expectation_Failed()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_EXPECTATION_FAILED . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_EXPECTATION_FAILED
		);
	}

	public static function header_Unused_418()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_UNUSED_418 . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_UNUSED_418
		);
	}

	public static function header_Misdirected_Request()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_MISDIRECTED_REQUEST . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_MISDIRECTED_REQUEST
		);
	}

	public static function header_Unprocessable_Content()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_UNPROCESSABLE_CONTENT . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_UNPROCESSABLE_CONTENT
		);
	}

	public static function header_Locked()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_LOCKED . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_LOCKED
		);
	}

	public static function header_Failed_Dependency()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_FAILED_DEPENDENCY . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_FAILED_DEPENDENCY
		);
	}

	public static function header_Too_Early()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_TOO_EARLY . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_TOO_EARLY
		);
	}

	public static function header_Upgrade_Required()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_UPGRADE_REQUIRED . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_UPGRADE_REQUIRED
		);
	}

	public static function header_Precondition_Required()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_PRECONDITION_REQUIRED . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_PRECONDITION_REQUIRED
		);
	}

	public static function header_Too_Many_Requests()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_TOO_MANY_REQUESTS . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_TOO_MANY_REQUESTS
		);
	}

	public static function header_Request_Header_Fields_Too_Large()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_REQUEST_HEADER_FIELDS_TOO_LARGE . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_REQUEST_HEADER_FIELDS_TOO_LARGE
		);
	}

	public static function header_Unavailable_For_Legal_Reasons()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_UNAVAILABLE_FOR_LEGAL_REASONS . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_UNAVAILABLE_FOR_LEGAL_REASONS
		);
	}

	public static function header_Internal_Server_Error()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_INTERNAL_SERVER_ERROR . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_INTERNAL_SERVER_ERROR
		);
	}

	public static function header_Not_Implemented()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_NOT_IMPLEMENTED . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_NOT_IMPLEMENTED
		);
	}

	public static function header_Bad_Gateway()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_BAD_GATEWAY . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_BAD_GATEWAY
		);
	}

	public static function header_Service_Unavailable()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_SERVICE_UNAVAILABLE . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_SERVICE_UNAVAILABLE
		);
	}

	public static function header_Gateway_Timeout()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_GATEWAY_TIMEOUT . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_GATEWAY_TIMEOUT
		);
	}

	public static function header_HTTP_Version_Not_Supported()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_HTTP_VERSION_NOT_SUPPORTED . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_HTTP_VERSION_NOT_SUPPORTED
		);
	}

	public static function header_Variant_Also_Negotiates()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_VARIANT_ALSO_NEGOTIATES . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_VARIANT_ALSO_NEGOTIATES
		);
	}

	public static function header_Insufficient_Storage()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_INSUFFICIENT_STORAGE . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_INSUFFICIENT_STORAGE
		);
	}

	public static function header_Loop_Detected()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_LOOP_DETECTED . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_LOOP_DETECTED
		);
	}

	public static function header_Not_Extended_OBSOLETED()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_NOT_EXTENDED_OBSOLETED . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_NOT_EXTENDED_OBSOLETED
		);
	}

	public static function header_Network_Authentication_Required()
	{
		header(
			header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE_NETWORK_AUTHENTICATION_REQUIRED . ' ' . self::$aCode[self::CODE_NETWORK_AUTHENTICATION_REQUIRED],
			replace: true,
			response_code: self::CODE_NETWORK_AUTHENTICATION_REQUIRED
		);
	}

}