<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/container/v1/cluster_service.proto

namespace Google\Cloud\Container\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Parameters that describe the nodes in a cluster.
 *
 * Generated from protobuf message <code>google.container.v1.NodeConfig</code>
 */
class NodeConfig extends \Google\Protobuf\Internal\Message
{
    /**
     * The name of a Google Compute Engine [machine
     * type](/compute/docs/machine-types) (e.g.
     * `n1-standard-1`).
     * If unspecified, the default machine type is
     * `n1-standard-1`.
     *
     * Generated from protobuf field <code>string machine_type = 1;</code>
     */
    private $machine_type = '';
    /**
     * Size of the disk attached to each node, specified in GB.
     * The smallest allowed disk size is 10GB.
     * If unspecified, the default disk size is 100GB.
     *
     * Generated from protobuf field <code>int32 disk_size_gb = 2;</code>
     */
    private $disk_size_gb = 0;
    /**
     * The set of Google API scopes to be made available on all of the
     * node VMs under the "default" service account.
     * The following scopes are recommended, but not required, and by default are
     * not included:
     * * `https://www.googleapis.com/auth/compute` is required for mounting
     * persistent storage on your nodes.
     * * `https://www.googleapis.com/auth/devstorage.read_only` is required for
     * communicating with **gcr.io**
     * (the [Google Container Registry](/container-registry/)).
     * If unspecified, no scopes are added, unless Cloud Logging or Cloud
     * Monitoring are enabled, in which case their required scopes will be added.
     *
     * Generated from protobuf field <code>repeated string oauth_scopes = 3;</code>
     */
    private $oauth_scopes;
    /**
     * The Google Cloud Platform Service Account to be used by the node VMs. If
     * no Service Account is specified, the "default" service account is used.
     *
     * Generated from protobuf field <code>string service_account = 9;</code>
     */
    private $service_account = '';
    /**
     * The metadata key/value pairs assigned to instances in the cluster.
     * Keys must conform to the regexp [a-zA-Z0-9-_]+ and be less than 128 bytes
     * in length. These are reflected as part of a URL in the metadata server.
     * Additionally, to avoid ambiguity, keys must not conflict with any other
     * metadata keys for the project or be one of the four reserved keys:
     * "instance-template", "kube-env", "startup-script", and "user-data"
     * Values are free-form strings, and only have meaning as interpreted by
     * the image running in the instance. The only restriction placed on them is
     * that each value's size must be less than or equal to 32 KB.
     * The total size of all keys and values must be less than 512 KB.
     *
     * Generated from protobuf field <code>map<string, string> metadata = 4;</code>
     */
    private $metadata;
    /**
     * The image type to use for this node. Note that for a given image type,
     * the latest version of it will be used.
     *
     * Generated from protobuf field <code>string image_type = 5;</code>
     */
    private $image_type = '';
    /**
     * The map of Kubernetes labels (key/value pairs) to be applied to each node.
     * These will added in addition to any default label(s) that
     * Kubernetes may apply to the node.
     * In case of conflict in label keys, the applied set may differ depending on
     * the Kubernetes version -- it's best to assume the behavior is undefined
     * and conflicts should be avoided.
     * For more information, including usage and the valid values, see:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/
     *
     * Generated from protobuf field <code>map<string, string> labels = 6;</code>
     */
    private $labels;
    /**
     * The number of local SSD disks to be attached to the node.
     * The limit for this value is dependant upon the maximum number of
     * disks available on a machine per zone. See:
     * https://cloud.google.com/compute/docs/disks/local-ssd#local_ssd_limits
     * for more information.
     *
     * Generated from protobuf field <code>int32 local_ssd_count = 7;</code>
     */
    private $local_ssd_count = 0;
    /**
     * The list of instance tags applied to all nodes. Tags are used to identify
     * valid sources or targets for network firewalls and are specified by
     * the client during cluster or node pool creation. Each tag within the list
     * must comply with RFC1035.
     *
     * Generated from protobuf field <code>repeated string tags = 8;</code>
     */
    private $tags;
    /**
     * Whether the nodes are created as preemptible VM instances. See:
     * https://cloud.google.com/compute/docs/instances/preemptible for more
     * information about preemptible VM instances.
     *
     * Generated from protobuf field <code>bool preemptible = 10;</code>
     */
    private $preemptible = false;
    /**
     * A list of hardware accelerators to be attached to each node.
     * See https://cloud.google.com/compute/docs/gpus for more information about
     * support for GPUs.
     *
     * Generated from protobuf field <code>repeated .google.container.v1.AcceleratorConfig accelerators = 11;</code>
     */
    private $accelerators;
    /**
     * Minimum CPU platform to be used by this instance. The instance may be
     * scheduled on the specified or newer CPU platform. Applicable values are the
     * friendly names of CPU platforms, such as
     * <code>minCpuPlatform: &quot;Intel Haswell&quot;</code> or
     * <code>minCpuPlatform: &quot;Intel Sandy Bridge&quot;</code>. For more
     * information, read [how to specify min CPU platform](https://cloud.google.com/compute/docs/instances/specify-min-cpu-platform)
     *
     * Generated from protobuf field <code>string min_cpu_platform = 13;</code>
     */
    private $min_cpu_platform = '';

    public function __construct() {
        \GPBMetadata\Google\Container\V1\ClusterService::initOnce();
        parent::__construct();
    }

    /**
     * The name of a Google Compute Engine [machine
     * type](/compute/docs/machine-types) (e.g.
     * `n1-standard-1`).
     * If unspecified, the default machine type is
     * `n1-standard-1`.
     *
     * Generated from protobuf field <code>string machine_type = 1;</code>
     * @return string
     */
    public function getMachineType()
    {
        return $this->machine_type;
    }

    /**
     * The name of a Google Compute Engine [machine
     * type](/compute/docs/machine-types) (e.g.
     * `n1-standard-1`).
     * If unspecified, the default machine type is
     * `n1-standard-1`.
     *
     * Generated from protobuf field <code>string machine_type = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setMachineType($var)
    {
        GPBUtil::checkString($var, True);
        $this->machine_type = $var;

        return $this;
    }

    /**
     * Size of the disk attached to each node, specified in GB.
     * The smallest allowed disk size is 10GB.
     * If unspecified, the default disk size is 100GB.
     *
     * Generated from protobuf field <code>int32 disk_size_gb = 2;</code>
     * @return int
     */
    public function getDiskSizeGb()
    {
        return $this->disk_size_gb;
    }

    /**
     * Size of the disk attached to each node, specified in GB.
     * The smallest allowed disk size is 10GB.
     * If unspecified, the default disk size is 100GB.
     *
     * Generated from protobuf field <code>int32 disk_size_gb = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setDiskSizeGb($var)
    {
        GPBUtil::checkInt32($var);
        $this->disk_size_gb = $var;

        return $this;
    }

    /**
     * The set of Google API scopes to be made available on all of the
     * node VMs under the "default" service account.
     * The following scopes are recommended, but not required, and by default are
     * not included:
     * * `https://www.googleapis.com/auth/compute` is required for mounting
     * persistent storage on your nodes.
     * * `https://www.googleapis.com/auth/devstorage.read_only` is required for
     * communicating with **gcr.io**
     * (the [Google Container Registry](/container-registry/)).
     * If unspecified, no scopes are added, unless Cloud Logging or Cloud
     * Monitoring are enabled, in which case their required scopes will be added.
     *
     * Generated from protobuf field <code>repeated string oauth_scopes = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getOauthScopes()
    {
        return $this->oauth_scopes;
    }

    /**
     * The set of Google API scopes to be made available on all of the
     * node VMs under the "default" service account.
     * The following scopes are recommended, but not required, and by default are
     * not included:
     * * `https://www.googleapis.com/auth/compute` is required for mounting
     * persistent storage on your nodes.
     * * `https://www.googleapis.com/auth/devstorage.read_only` is required for
     * communicating with **gcr.io**
     * (the [Google Container Registry](/container-registry/)).
     * If unspecified, no scopes are added, unless Cloud Logging or Cloud
     * Monitoring are enabled, in which case their required scopes will be added.
     *
     * Generated from protobuf field <code>repeated string oauth_scopes = 3;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setOauthScopes($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->oauth_scopes = $arr;

        return $this;
    }

    /**
     * The Google Cloud Platform Service Account to be used by the node VMs. If
     * no Service Account is specified, the "default" service account is used.
     *
     * Generated from protobuf field <code>string service_account = 9;</code>
     * @return string
     */
    public function getServiceAccount()
    {
        return $this->service_account;
    }

    /**
     * The Google Cloud Platform Service Account to be used by the node VMs. If
     * no Service Account is specified, the "default" service account is used.
     *
     * Generated from protobuf field <code>string service_account = 9;</code>
     * @param string $var
     * @return $this
     */
    public function setServiceAccount($var)
    {
        GPBUtil::checkString($var, True);
        $this->service_account = $var;

        return $this;
    }

    /**
     * The metadata key/value pairs assigned to instances in the cluster.
     * Keys must conform to the regexp [a-zA-Z0-9-_]+ and be less than 128 bytes
     * in length. These are reflected as part of a URL in the metadata server.
     * Additionally, to avoid ambiguity, keys must not conflict with any other
     * metadata keys for the project or be one of the four reserved keys:
     * "instance-template", "kube-env", "startup-script", and "user-data"
     * Values are free-form strings, and only have meaning as interpreted by
     * the image running in the instance. The only restriction placed on them is
     * that each value's size must be less than or equal to 32 KB.
     * The total size of all keys and values must be less than 512 KB.
     *
     * Generated from protobuf field <code>map<string, string> metadata = 4;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * The metadata key/value pairs assigned to instances in the cluster.
     * Keys must conform to the regexp [a-zA-Z0-9-_]+ and be less than 128 bytes
     * in length. These are reflected as part of a URL in the metadata server.
     * Additionally, to avoid ambiguity, keys must not conflict with any other
     * metadata keys for the project or be one of the four reserved keys:
     * "instance-template", "kube-env", "startup-script", and "user-data"
     * Values are free-form strings, and only have meaning as interpreted by
     * the image running in the instance. The only restriction placed on them is
     * that each value's size must be less than or equal to 32 KB.
     * The total size of all keys and values must be less than 512 KB.
     *
     * Generated from protobuf field <code>map<string, string> metadata = 4;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setMetadata($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->metadata = $arr;

        return $this;
    }

    /**
     * The image type to use for this node. Note that for a given image type,
     * the latest version of it will be used.
     *
     * Generated from protobuf field <code>string image_type = 5;</code>
     * @return string
     */
    public function getImageType()
    {
        return $this->image_type;
    }

    /**
     * The image type to use for this node. Note that for a given image type,
     * the latest version of it will be used.
     *
     * Generated from protobuf field <code>string image_type = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setImageType($var)
    {
        GPBUtil::checkString($var, True);
        $this->image_type = $var;

        return $this;
    }

    /**
     * The map of Kubernetes labels (key/value pairs) to be applied to each node.
     * These will added in addition to any default label(s) that
     * Kubernetes may apply to the node.
     * In case of conflict in label keys, the applied set may differ depending on
     * the Kubernetes version -- it's best to assume the behavior is undefined
     * and conflicts should be avoided.
     * For more information, including usage and the valid values, see:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/
     *
     * Generated from protobuf field <code>map<string, string> labels = 6;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * The map of Kubernetes labels (key/value pairs) to be applied to each node.
     * These will added in addition to any default label(s) that
     * Kubernetes may apply to the node.
     * In case of conflict in label keys, the applied set may differ depending on
     * the Kubernetes version -- it's best to assume the behavior is undefined
     * and conflicts should be avoided.
     * For more information, including usage and the valid values, see:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/
     *
     * Generated from protobuf field <code>map<string, string> labels = 6;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setLabels($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->labels = $arr;

        return $this;
    }

    /**
     * The number of local SSD disks to be attached to the node.
     * The limit for this value is dependant upon the maximum number of
     * disks available on a machine per zone. See:
     * https://cloud.google.com/compute/docs/disks/local-ssd#local_ssd_limits
     * for more information.
     *
     * Generated from protobuf field <code>int32 local_ssd_count = 7;</code>
     * @return int
     */
    public function getLocalSsdCount()
    {
        return $this->local_ssd_count;
    }

    /**
     * The number of local SSD disks to be attached to the node.
     * The limit for this value is dependant upon the maximum number of
     * disks available on a machine per zone. See:
     * https://cloud.google.com/compute/docs/disks/local-ssd#local_ssd_limits
     * for more information.
     *
     * Generated from protobuf field <code>int32 local_ssd_count = 7;</code>
     * @param int $var
     * @return $this
     */
    public function setLocalSsdCount($var)
    {
        GPBUtil::checkInt32($var);
        $this->local_ssd_count = $var;

        return $this;
    }

    /**
     * The list of instance tags applied to all nodes. Tags are used to identify
     * valid sources or targets for network firewalls and are specified by
     * the client during cluster or node pool creation. Each tag within the list
     * must comply with RFC1035.
     *
     * Generated from protobuf field <code>repeated string tags = 8;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * The list of instance tags applied to all nodes. Tags are used to identify
     * valid sources or targets for network firewalls and are specified by
     * the client during cluster or node pool creation. Each tag within the list
     * must comply with RFC1035.
     *
     * Generated from protobuf field <code>repeated string tags = 8;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setTags($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->tags = $arr;

        return $this;
    }

    /**
     * Whether the nodes are created as preemptible VM instances. See:
     * https://cloud.google.com/compute/docs/instances/preemptible for more
     * information about preemptible VM instances.
     *
     * Generated from protobuf field <code>bool preemptible = 10;</code>
     * @return bool
     */
    public function getPreemptible()
    {
        return $this->preemptible;
    }

    /**
     * Whether the nodes are created as preemptible VM instances. See:
     * https://cloud.google.com/compute/docs/instances/preemptible for more
     * information about preemptible VM instances.
     *
     * Generated from protobuf field <code>bool preemptible = 10;</code>
     * @param bool $var
     * @return $this
     */
    public function setPreemptible($var)
    {
        GPBUtil::checkBool($var);
        $this->preemptible = $var;

        return $this;
    }

    /**
     * A list of hardware accelerators to be attached to each node.
     * See https://cloud.google.com/compute/docs/gpus for more information about
     * support for GPUs.
     *
     * Generated from protobuf field <code>repeated .google.container.v1.AcceleratorConfig accelerators = 11;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getAccelerators()
    {
        return $this->accelerators;
    }

    /**
     * A list of hardware accelerators to be attached to each node.
     * See https://cloud.google.com/compute/docs/gpus for more information about
     * support for GPUs.
     *
     * Generated from protobuf field <code>repeated .google.container.v1.AcceleratorConfig accelerators = 11;</code>
     * @param \Google\Cloud\Container\V1\AcceleratorConfig[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setAccelerators($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Container\V1\AcceleratorConfig::class);
        $this->accelerators = $arr;

        return $this;
    }

    /**
     * Minimum CPU platform to be used by this instance. The instance may be
     * scheduled on the specified or newer CPU platform. Applicable values are the
     * friendly names of CPU platforms, such as
     * <code>minCpuPlatform: &quot;Intel Haswell&quot;</code> or
     * <code>minCpuPlatform: &quot;Intel Sandy Bridge&quot;</code>. For more
     * information, read [how to specify min CPU platform](https://cloud.google.com/compute/docs/instances/specify-min-cpu-platform)
     *
     * Generated from protobuf field <code>string min_cpu_platform = 13;</code>
     * @return string
     */
    public function getMinCpuPlatform()
    {
        return $this->min_cpu_platform;
    }

    /**
     * Minimum CPU platform to be used by this instance. The instance may be
     * scheduled on the specified or newer CPU platform. Applicable values are the
     * friendly names of CPU platforms, such as
     * <code>minCpuPlatform: &quot;Intel Haswell&quot;</code> or
     * <code>minCpuPlatform: &quot;Intel Sandy Bridge&quot;</code>. For more
     * information, read [how to specify min CPU platform](https://cloud.google.com/compute/docs/instances/specify-min-cpu-platform)
     *
     * Generated from protobuf field <code>string min_cpu_platform = 13;</code>
     * @param string $var
     * @return $this
     */
    public function setMinCpuPlatform($var)
    {
        GPBUtil::checkString($var, True);
        $this->min_cpu_platform = $var;

        return $this;
    }

}

