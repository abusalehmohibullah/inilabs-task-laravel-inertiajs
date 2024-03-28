<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import FormSection from '../Components/FormSection.vue';
import TextInput from '../Components/TextInput.vue';
import InputLabel from '../Components/InputLabel.vue';
import PrimaryButton from '../Components/PrimaryButton.vue';
import SelectInput from '../Components/SelectInput.vue';

const form = useForm({
  shape: '',
  radius: '',
  height: '',
  width: ''
});
const props = defineProps({
    area: String
});
const shapes = [
  { id: 'circle', name: 'Circle' },
  { id: 'rectangle', name: 'Rectangle' }
];

const selectedShape = ref({ id: '', name: '' });

watch(() => form.shape, (newShape, oldShape) => {
  const selectedShapeOption = shapes.find(shape => shape.id == newShape);
  if (selectedShapeOption) {
    selectedShape.value = { id: selectedShapeOption.id, name: selectedShapeOption.name };
  } else {
    selectedShape.value = { id: '', name: '' };
  }
});

const handleShapeSelected = (selectedLabel) => {
  const selectedId = selectedLabel;
  const selectedShapeOption = shapes.find(shape => shape.id == selectedId);
  if (selectedShapeOption) {
    form.shape = selectedShapeOption.id;
  }
};
const calculateArea = () => {
  form.post(route('calculate-area.calculate'), {
    preserveScroll: true,
  })
};
</script>

<template>
  <AppLayout>

    <Head title="Calculate Area" />
    <template #header>
      Calculate Area
    </template>

    <template #main>
      <div>
        <FormSection @submitted="calculateArea">
          <template #heading>
            Calculate Area
          </template>
          <template #form>
            <InputLabel for="shape" value="Select Shape" />
            <SelectInput :options="shapes" inputName="shape" :fieldName="'name'" :valueField="'id'"
              :selectedOption="selectedShape" @option-selected="handleShapeSelected" />

            <!-- Show radius input for circle -->
            <div class="flex flex-col gap-3"v-if="form.shape === 'circle'">
              <InputLabel for="radius" value="Enter Radius" />
              <TextInput id="radius" v-model="form.radius" required class="block w-full" type="text" name="radius" />
            </div>
            <!-- Show height and width inputs for rectangle -->
            <div class="flex flex-col gap-3"v-else-if="form.shape === 'rectangle'">
              <InputLabel for="height" value="Enter Height" />
              <TextInput id="height" v-model="form.height" required class="block w-full" type="text" name="height" />
              <InputLabel for="width" value="Enter Width" />
              <TextInput id="width" v-model="form.width" required class="block w-full" type="text" name="width" />
            </div>

            <div class="flex flex-col gap-3"v-if="props.area">
              <InputLabel for="area" value="Area" />
              <TextInput id="area" v-model="props.area" required class="block w-full" type="text" name="area" />
            </div>
          </template>

          <template #actions>
            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Validate</PrimaryButton>
          </template>
        </FormSection>
      </div>
    </template>
  </AppLayout>
</template>
