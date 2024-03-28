<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import FormSection from '../Components/FormSection.vue';
import TextInput from '../Components/TextInput.vue';
import InputLabel from '../Components/InputLabel.vue';
import PrimaryButton from '../Components/PrimaryButton.vue';

const form = useForm({
  parentheses_input: '',
});

const props = defineProps({
    isValid: String
});

const validateParentheses = () => {
  form.post(route('valid-parentheses.validate'), {
    preserveScroll: true,
  })
};
</script>

<template>
  <AppLayout>

    <Head title="Valid Parentheses" />
    <template #header>
      Valid Parentheses
    </template>

    <template #main>
      <div>
        <FormSection @submitted="validateParentheses">
          <template #heading>
            Validate Parentheses
            <div v-if="props.isValid != null" class="absolute top-0 right-0" :class="{ 'text-green-700': props.isValid, 'text-red-700': !props.isValid,  }">
              <i v-if="props.isValid" class="bi bi-check-circle-fill"></i>
              <i v-else class="bi bi-x-circle-fill"></i>
              {{ props.isValid ? 'Valid' : 'Invalid'}}
            </div>
          </template>
          <template #form>
            <InputLabel for="parentheses-input" value="Enter Parentheses" />
            <TextInput id="parentheses-input" v-model="form.parentheses_input" required class="block w-full" type="text"
              name="parentheses_input" />
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
