<template>
  <AdminLayout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex-auto pb-3 text-right">
            <a-button type="primary" @click="createRecord()">Add</a-button>
        </div>
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <a-table :dataSource="estates" :columns="columns">
            <template #headerCell="{ column }">
              {{column.title}}
            </template>
            <template #bodyCell="{ column, text, record, index }">
              <template v-if="column.dataIndex == 'operation'">
                <inertia-link :href="route('admin.properties.index')">
                  <a-button >Properties</a-button>
                </inertia-link>
                <a-button @click="editRecord(record)">Edit</a-button>
              </template>
              <template v-else>
                {{ record[column.dataIndex] }}
              </template>
            </template>
          </a-table>
        </div>
      </div>
    </div>
    <!-- Modal Start-->
    <a-modal 
        v-model:open="modal.isOpen" 
        :title="modal.title" width="50%"
        @ok="onModalOk"
        okText="Confirm"
    >
      <a-form
        ref="modalRef"
        :model="modal.data"
        name="Teacher"
        :label-col="{ span: 4 }"
        :wrapper-col="{ span: 20 }"
        autocomplete="off"
        :rules="rules"
        :validate-messages="validateMessages"
      >
        <a-form-item label="key" name="key">
          <a-input v-model:value="modal.data.key" />
        </a-form-item>
      </a-form>
    </a-modal>
    <!-- Modal End-->


  </AdminLayout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
  components: {
    AdminLayout,
  },
  props: ["estates"],
  data() {
    return {
      modal: {
        isOpen: false,
        data: {},
        title: "Modal",
        mode: "",
      },
      columns: [
        {
          title: "區域",
          dataIndex: "name",
        },{
          title: "小區",
          dataIndex: "region",
        },{
          title: "座數",
          dataIndex: "blocks",
        },{
          title: "單位數",
          dataIndex: "units",
        },{
          title: "操作",
          dataIndex: "operation",
        },
      ],
      rules: {
        name: { required: true },
        email: { required: true, type: "email" },
        password: { required: true },
      },
      validateMessages: {
        required: "${label} is required!",
        types: {
          email: "${label} is not a valid email!",
          number: "${label} is not a valid number!",
        },
        number: {
          range: "${label} must be between ${min} and ${max}",
        },
      },
      labelCol: {
        style: {
          width: "150px",
        },
      },
    };
  },
  methods:{
    createRecord(){
      this.modal.data = {};
      this.modal.mode = "CREATE";
      this.modal.title = "Create";
      this.modal.isOpen = true;
        
    },
    editRecord(record) {
      this.modal.data = { ...record };
      this.modal.mode = "EDIT";
      this.modal.title = "Edit";
      this.modal.isOpen = true;
    },
    onModalOk(){
        if(this.modal.mode=='CREATE'){
            console.log('CREATE')
        }else{
            console.log('UPDATE')
        }
        console.log(this.modal.data)
        this.modal.data={}
        this.modal.isOpen=false
    }

  }
};
</script>