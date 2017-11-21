<?php
namespace ChromeDevtoolsProtocol\Domain;

use ChromeDevtoolsProtocol\ContextInterface;
use ChromeDevtoolsProtocol\InternalClientInterface;
use ChromeDevtoolsProtocol\Model\Storage\CacheStorageContentUpdatedEvent;
use ChromeDevtoolsProtocol\Model\Storage\CacheStorageListUpdatedEvent;
use ChromeDevtoolsProtocol\Model\Storage\ClearDataForOriginRequest;
use ChromeDevtoolsProtocol\Model\Storage\GetUsageAndQuotaRequest;
use ChromeDevtoolsProtocol\Model\Storage\GetUsageAndQuotaResponse;
use ChromeDevtoolsProtocol\Model\Storage\IndexedDBContentUpdatedEvent;
use ChromeDevtoolsProtocol\Model\Storage\IndexedDBListUpdatedEvent;
use ChromeDevtoolsProtocol\Model\Storage\TrackCacheStorageForOriginRequest;
use ChromeDevtoolsProtocol\Model\Storage\TrackIndexedDBForOriginRequest;
use ChromeDevtoolsProtocol\Model\Storage\UntrackCacheStorageForOriginRequest;
use ChromeDevtoolsProtocol\Model\Storage\UntrackIndexedDBForOriginRequest;
use ChromeDevtoolsProtocol\SubscriptionInterface;

class StorageDomain implements StorageDomainInterface
{
	/** @var InternalClientInterface */
	public $internalClient;


	public function __construct(InternalClientInterface $internalClient)
	{
		$this->internalClient = $internalClient;
	}


	public function clearDataForOrigin(ContextInterface $ctx, ClearDataForOriginRequest $request): void
	{
		$this->internalClient->executeCommand($ctx, 'Storage.clearDataForOrigin', $request);
	}


	public function getUsageAndQuota(ContextInterface $ctx, GetUsageAndQuotaRequest $request): GetUsageAndQuotaResponse
	{
		$response = $this->internalClient->executeCommand($ctx, 'Storage.getUsageAndQuota', $request);
		return GetUsageAndQuotaResponse::fromJson($response);
	}


	public function trackCacheStorageForOrigin(ContextInterface $ctx, TrackCacheStorageForOriginRequest $request): void
	{
		$this->internalClient->executeCommand($ctx, 'Storage.trackCacheStorageForOrigin', $request);
	}


	public function untrackCacheStorageForOrigin(ContextInterface $ctx, UntrackCacheStorageForOriginRequest $request): void
	{
		$this->internalClient->executeCommand($ctx, 'Storage.untrackCacheStorageForOrigin', $request);
	}


	public function trackIndexedDBForOrigin(ContextInterface $ctx, TrackIndexedDBForOriginRequest $request): void
	{
		$this->internalClient->executeCommand($ctx, 'Storage.trackIndexedDBForOrigin', $request);
	}


	public function untrackIndexedDBForOrigin(ContextInterface $ctx, UntrackIndexedDBForOriginRequest $request): void
	{
		$this->internalClient->executeCommand($ctx, 'Storage.untrackIndexedDBForOrigin', $request);
	}


	public function addCacheStorageListUpdatedListener(callable $listener): SubscriptionInterface
	{
		return $this->internalClient->addListener('Storage.cacheStorageListUpdated', $listener);
	}


	public function awaitCacheStorageListUpdated(ContextInterface $ctx): CacheStorageListUpdatedEvent
	{
		return CacheStorageListUpdatedEvent::fromJson($this->internalClient->awaitEvent($ctx, 'Storage.cacheStorageListUpdated'));
	}


	public function addCacheStorageContentUpdatedListener(callable $listener): SubscriptionInterface
	{
		return $this->internalClient->addListener('Storage.cacheStorageContentUpdated', $listener);
	}


	public function awaitCacheStorageContentUpdated(ContextInterface $ctx): CacheStorageContentUpdatedEvent
	{
		return CacheStorageContentUpdatedEvent::fromJson($this->internalClient->awaitEvent($ctx, 'Storage.cacheStorageContentUpdated'));
	}


	public function addIndexedDBListUpdatedListener(callable $listener): SubscriptionInterface
	{
		return $this->internalClient->addListener('Storage.indexedDBListUpdated', $listener);
	}


	public function awaitIndexedDBListUpdated(ContextInterface $ctx): IndexedDBListUpdatedEvent
	{
		return IndexedDBListUpdatedEvent::fromJson($this->internalClient->awaitEvent($ctx, 'Storage.indexedDBListUpdated'));
	}


	public function addIndexedDBContentUpdatedListener(callable $listener): SubscriptionInterface
	{
		return $this->internalClient->addListener('Storage.indexedDBContentUpdated', $listener);
	}


	public function awaitIndexedDBContentUpdated(ContextInterface $ctx): IndexedDBContentUpdatedEvent
	{
		return IndexedDBContentUpdatedEvent::fromJson($this->internalClient->awaitEvent($ctx, 'Storage.indexedDBContentUpdated'));
	}
}