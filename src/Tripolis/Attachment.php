<?php

namespace jobcastrop\tripolis;

class Attachment extends TripolisService
{
	public function deleteTag ($tagId)
	{
		$request = array(
			'deleteTagRequest' => array(
				'tagId' => $tagId,

		$result = $this->send("/api2/soap/AttachmentService?wsdl", 'deleteTag', $request);
		return $result;
	}

	public function updateTag ($tag, $tagId)
	{
		$request = array(
			'updateTagRequest' => array(
				'tag' => $tag,
				'tagId' => $tagId,

		$result = $this->send("/api2/soap/AttachmentService?wsdl", 'updateTag', $request);
		return $result;
	}

	public function getById ($includeContent)
	{
		$request = array(
			'getByIdRequest' => array(
				'includeContent' => $includeContent,

		$result = $this->send("/api2/soap/AttachmentService?wsdl", 'getById', $request);
		return $result->attachment->attachmentType;
	}

	public function createTag ($tag, $workspaceId)
	{
		$request = array(
			'createTagRequest' => array(
				'tag' => $tag,
				'workspaceId' => $workspaceId,

		$result = $this->send("/api2/soap/AttachmentService?wsdl", 'createTag', $request);
		return $result;
	}

	public function getByTagIds ($tagIds, $matchAnyTag)
	{
		$request = array(
			'getByTagIdsRequest' => array(
				'tagIds' => $tagIds,
				'matchAnyTag' => $matchAnyTag,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)

		$return = [];
			$result = $this->send("/api2/soap/AttachmentService?wsdl", 'getByTagIds', $request);
			$request['getByTagIdsRequest']['paging']['pageNr']++;
			foreach($result->sorting as $row) {
				$return[] = $row;
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function create ($workspaceId, $label, $name, $description, $attachmentType, $content, $attachmentTagIds, $properties)
	{
		$request = array(
			'createRequest' => array(
				'workspaceId' => $workspaceId,
				'label' => $label,
				'name' => $name,
				'description' => $description,
				'attachmentType' => $attachmentType,
				'content' => $content,
				'attachmentTagIds' => $attachmentTagIds,
				'properties' => $properties,

		$result = $this->send("/api2/soap/AttachmentService?wsdl", 'create', $request);
		return $result;
	}

	public function getTagsByWorkspaceId ($workspaceId)
	{
		$request = array(
			'getTagsByWorkspaceIdRequest' => array(
				'workspaceId' => $workspaceId,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)

		$return = [];
			$result = $this->send("/api2/soap/AttachmentService?wsdl", 'getTagsByWorkspaceId', $request);
			$request['getTagsByWorkspaceIdRequest']['paging']['pageNr']++;
			foreach($result->tags->tag as $row) {
				$return[] = $row;
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function update ($id, $label, $name, $description, $attachmentType, $content, $attachmentTagIds, $properties)
	{
		$request = array(
			'updateRequest' => array(
				'id' => $id,
				'label' => $label,
				'name' => $name,
				'description' => $description,
				'attachmentType' => $attachmentType,
				'content' => $content,
				'attachmentTagIds' => $attachmentTagIds,
				'properties' => $properties,

		$result = $this->send("/api2/soap/AttachmentService?wsdl", 'update', $request);
		return $result;
	}

	public function getByWorkspaceId ($workspaceId)
	{
		$request = array(
			'getByIdRequest' => array(
				'workspaceId' => $workspaceId,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)

		$return = [];
			$result = $this->send("/api2/soap/AttachmentService?wsdl", 'getByWorkspaceId', $request);
			$request['getByIdRequest']['paging']['pageNr']++;
			foreach($result->attachments->attachment as $row) {
				$return[] = $row;
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function delete ($id)
	{
		$request = array(
			'deleteRequest' => array(
				'id' => $id,

		$result = $this->send("/api2/soap/AttachmentService?wsdl", 'delete', $request);
		return $result;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/AttachmentService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

}